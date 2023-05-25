<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
//use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
//use Illuminate\Support\Facades\View;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Factory $factory)
    {
     //   return view('tweet.index', ['name' => 'laravel']);
     //   return View::make('tweet.index', ['name' => 'laravel']);
       return $factory->make('tweet.index', ['name' => 'laravel']); //factory
    }
}
