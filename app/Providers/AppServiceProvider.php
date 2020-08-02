<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('weatherCode', array(
            0 => "Cerah",
            1 => "Cerah Berawan",
            2 => "Cerah Berawan",
            3 => "Berawan",
            4 => "Berawan Tebal",
            5 => "Udara Kabur",
            10 => "Asap",
            45 => "Kabut",
            60 => "Hujan Ringan",
            61 => "Hujan Sedang",
            63 => "Hujan Lebat",
            80 => "Hujan Lokal",
            95 => "Hujan Petir",
            97 => "Hujan Petir",
        ));

        View::share('card', array(
            "N" => "North",
            "NNE" => "North-Northeast",
            "NE" => "Northeast",
            "ENE" => "East-Northeast",
            "E" => "East",
            "ESE" => "East-Southeast",
            "SE" => "Southeast",
            "SSE" => "South-Southeast",
            "S" => "South",
            "SSW" => "South-Southwest",
            "SW" => "Southwest",
            "WSW" => "West-Southwest",
            "W" => "West",
            "WNW" => "West-Northwest",
            "NW" => "Northwest",
            "NNW" => "North-Northwest",
            "VARIABEL" => "berubah-ubah",
        ));

        View::share('theusers', array(
            1=>"Administrator",
            2=>"Operator Meteo",
            3=>"Operator Klimatologi",
        ));

        View::share('catalogcat', array(
            1=>"Curah Hujan",
            2=>"Suhu Udara",
            3=>"Kelembaban Udara",
            4=>"Arah dan Kecepatan Angin",
            5=>"Lama Penyinaran Matahari",
            6=>"Tekanan Udara",
        ));

        View::share('maskapai', array(
            1=>"Air Asia",
            2=>"Batavia Air",
            3=>"Batik Air",
            4=>"Citilink",
            5=>"Garuda Indonesia",
            6=>"Kal Star Aviation",
            7=>"Lion Air",
            8=>"Merpati Nusantara",
            9=>"Mandala Airlines",
            10=>"Sri Wijaya Air",
            11=>"Susi Air",
            12=>"Tiger Air",
            13=>"Wings Air",
        ));
    }
}
