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
    }
}
