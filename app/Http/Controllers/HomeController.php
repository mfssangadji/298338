<?php

namespace App\Http\Controllers;

use App\Home;
use App\Album;
use App\Gallery;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Carbon\carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xml = @simplexml_load_file('https://data.bmkg.go.id/datamkg/MEWS/DigitalForecast/DigitalForecast-MalukuUtara.xml');

        for($i=0; $i<count($xml->forecast->area); $i++){
            $area[] = $xml->forecast->area[$i];
        }

        // echo '<pre>';
        // print_r($area);
        // die();

        $forcast = array();
        foreach($area as $area){
            $w[$area['id']->__toString()] = $area['description']->__toString();
            foreach($area->parameter as $area_parameter){
                $time = NULL;
                $datetime = NULL;
                $value = NULL;
                foreach($area_parameter->timerange as $area_parameter_timerange){
                    if($area_parameter_timerange['type']->__toString() == "daily"){
                        $time[] = $area_parameter_timerange['day']->__toString();
                        $datetime[] = $area_parameter_timerange['datetime']->__toString();
                        foreach($area_parameter_timerange->value as $e => $v){
                            $value[$area['id']->__toString()][$v['unit']->__toString()][] = $v->__toString();
                        }

                        $forecast[$area['id']->__toString()][$area_parameter['id']->__toString()] = array(
                            'type' => $area_parameter_timerange['type']->__toString(),
                            'h' => $time,
                            'datetime' => $datetime,
                            'value' => $value[$area['id']->__toString()],
                        );
                    }else{
                        $time[] = $area_parameter_timerange['h']->__toString();
                        $datetime[] = $area_parameter_timerange['datetime']->__toString();
                        foreach($area_parameter_timerange->value as $e => $v){
                            $value[$area['id']->__toString()][$v['unit']->__toString()][] = $v->__toString();
                        }

                        $forecast[$area['id']->__toString()][$area_parameter['id']->__toString()] = array(
                            'type' => $area_parameter_timerange['type']->__toString(),
                            'h' => $time,
                            'datetime' => $datetime,
                            'value' => $value[$area['id']->__toString()],
                        );
                    }
                }
            }
        }

        $now = new DateTime();

        // echo '<pre>';
        // print_r($forecast);
        
        foreach($forecast as $key => $val){
            if($val['weather']['type'] == "hourly"){ // HOURLY JUST FOR WEATHER 
                $dtime_comp[$key] = array_chunk($val['weather']['datetime'], 4);
            }
        }

        foreach($dtime_comp as $key => $val){
            foreach($val as $keys => $vals){
                $dtime_comp[$key] = $val[1]; // GET CURRENT DAY
            }
        }

        $i=0;
        foreach($dtime_comp as $key => $val){
            $i=0;
            foreach($val as $keys => $vals){
                if(isset($val[$i+1])){
                    if(($now->format("H") > substr($val[$i], 8, 2))
                        && ($now->format("H") < substr($val[$i+1], 8, 2))){
                        $dtime_ext[$key] = $keys;
                    }else{
                        $dtime_ext[$key] = $keys+1;
                    }
                }
                $i++;
            }
        }

        // echo '<pre>';
        // print_r($dtime_comp);
        return view('welcome', compact('forecast', 'w', 'now', 'dtime_ext'));
    }

    public function weatherCode($val)
    {
        $wc = array(
            "0" => "Cerah",
            "1" => "Cerah Berawan",
            "2" => "Cerah Berawan",
            "3" => "Berawan",
            "4" => "Berawan Tebal",
            "5" => "Udara Kabur",
            "10" => "Asap",
            "45" => "Kabut",
            "60" => "Hujan Ringan",
            "61" => "Hujan Sedang",
            "63" => "Hujan Lebat",
            "80" => "Hujan Lokal",
            "95" => "Hujan Petir",
            "97" => "Hujan Petir",
        );

        $val = trim($val);
        return $wc[$val];
    }

    public function citra_satelit()
    {
        return view('main.citra-satelit');
    }

    public function ptinggi_gelombang()
    {
        $url = 'https://peta-maritim.bmkg.go.id/ofs/';
        return view('main.get_url_content', compact('url'));
    }

    public function permintaan_data()
    {
        return view('main.permintaan-data');
    }

    public function cuaca_aktual_bandara()
    {
        $xml = simplexml_load_file('http://aviation.bmkg.go.id/latest/observation.x.xml.php');
        for($i=0; $i<count($xml->report); $i++){
            $name = trim($xml->report[$i]->station_name);
            $forecast[$name] = array(
                'observed_time'=>$xml->report[$i]->observed_time,
                'time_zone'=>$xml->report[$i]->time_zone,
                'wind_direction'=>$xml->report[$i]->wind_direction,
                'wind_speed'=>$xml->report[$i]->wind_speed,
                'visibility'=>$xml->report[$i]->visibility,
                'weather'=>$xml->report[$i]->weather,
                'temp'=>$xml->report[$i]->temp,
                'dew_point'=>$xml->report[$i]->dew_point,
                'pressure'=>$xml->report[$i]->pressure,
            );
        }

        return view('main.cuaca-aktual-bandara', compact('forecast'));
    }

    public function pcuaca_bandara(Request $request)
    {
        error_reporting(0);
        $get = NULL;
        if(isset($request->id)){
            $xml = simplexml_load_file('http://aviation.bmkg.go.id/latest/forecast.x.xml.php?s='.$request->id);
            $get = $request->id;
        }else{
            $xml = simplexml_load_file('http://aviation.bmkg.go.id/latest/forecast.x.xml.php?s=1');
        }

        for($i=0; $i<count($xml->report); $i++){
            $name = trim($xml->report[$i]->station_name);
            $forecast[$name] = array(
                'wind_direction'=>$xml->report[$i]->wind_direction,
                'time_zone'=>$xml->report[$i]->time_zone,
                'time'=>$xml->report[$i]->forecast_time,
                'wind_speed'=>$xml->report[$i]->wind_speed,
                'visibility'=>$xml->report[$i]->visibility,
                'weather'=>$xml->report[$i]->weather,
                'symbol'=>$xml->report[$i]->symbol,
                'probability'=>$xml->report[$i]->probability,
            );
        }

        return view('main.pcuaca-bandara', compact('forecast', 'get'));
    }

    public function sigwx()
    {
        return view('main.sigwx');
    }

    public function gallery()
    {
        $album = Album::orderBy('id', 'DESC')->get();
        return view('main.gallery', compact('album'));
    }

    public function gallery_detail(Request $request)
    {
        $album = Album::find($request->id);
        return view('main.gallery_detail', compact('album'));
    }

    public function image_detail(Request $request)
    {
        $img = Gallery::find($request->imgid);
        return view('main.image_detail', compact('img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
