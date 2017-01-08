<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Request as AppRequest;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('orderButton', function ($expression){
            $input = explode(',', $expression);
            $requestString = '?field='.$input[1].'&sort=asc';

            $htmlOutput = '<a id="'.$input[1].'" class="'.
                $input[0] . '" href="' . AppRequest::url() .
                $requestString . '"> '.$input[2] . ' </a>';
            return $htmlOutput;
        });

        Blade::directive('searchForm', function ($expression){
            $input = explode(',', $expression);
            $rota = route($input[2]);
            $html =
                '<form class="form-inline pull-right search-input" action="'. $rota .'" method="GET">'
                .'<div class="input-group inline">'
                .'<input type="text" id="'.$input[0].'" name="'.$input[0].'" class="form-control" placeholder="'.$input[1].'" value="" style="width: 250px;">'
                .'</div>'
                .'</form>';
            return $html;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
