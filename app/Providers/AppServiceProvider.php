<?php

namespace App\Providers;

use App\Category;
use App\Contactus;
use App\Post;
use App\Semester;
use App\Type;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //!- share with all views
    /*
     * $categorz    -> all categories
     * $categories  -> all catgeories paginate 5
     * $semesters   -> all semesters
     * $contects    -> all contacts
     * $views       -> all views*/
    public function boot()
    {
        $categorz=Category::all();
        $categories=Category::latest()->paginate(5);
        $semesters=Semester::all();
        $types=Type::all();
        $contacts=Contactus::all();
        $views=Post::where('status',1)->latest()->paginate(6);
        view()->share(['categorz'=>$categorz]);
        view()->share(['categories'=>$categories]);
        view()->share(['semesters'=>$semesters]);
        view()->share(['types'=>$types]);
        view()->share(['contacts'=>$contacts]);
        view()->share(['views'=>$views]);

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
