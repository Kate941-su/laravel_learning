<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
//use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
//use Illuminate\Support\Facades\View;
use App\Models\Tweet;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Factory $factory)
    {
     //   return view('tweet.index', ['name' => 'laravel']);
     //   return View::make('tweet.index', ['name' => 'laravel']);
        $tweets = Tweet::all(); // DBの取得(all()で全て取得)
//        dd($tweets);
//        return view('tweet.index')->with('name', 'laravel')->with('version', '8');
        return view('tweet.index')->with('tweets', $tweets)->with('name', 'END');
    }
}
