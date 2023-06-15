<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;

//use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

//use Illuminate\Support\Facades\View;
use App\Models\Tweet;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    // TweetService $tweetServiceはServiceコンテナが自動的にクラスを判別し、$tweetServiceを注入した
    public function __invoke(Request $request, Factory $factory, TweetService $tweetService)
    {
        //   return view('tweet.index', ['name' => 'laravel']);
        //   return View::make('tweet.index', ['name' => 'laravel']);
        // 降順表示その１
        // $tweets = Tweet::all(); // DBの取得(all()で全て取得)
        // 降順表示その２
        // $tweets = Tweet::all()->sortByDesc('created_at');
        $tweets = $tweetService->getTweets();
        // dd($tweets);
        // return view('tweet.index')->with('name', 'laravel')->with('version', '8');
        return view('tweet.index')->with('tweets', $tweets)->with('name', 'END');
    }
}
