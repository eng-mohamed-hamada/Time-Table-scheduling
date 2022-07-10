<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('nots', function(){
            $term_id = DB::table('terms')->where('status', '=', 'current')->value('id');
            $thecount = DB::table('student_requests')
            ->where('term_id','=', $term_id)
            ->where('status', '=', null)
            ->count();
            return $thecount;
        });
        Schema::enableForeignKeyConstraints();
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
