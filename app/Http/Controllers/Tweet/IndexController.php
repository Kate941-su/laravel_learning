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
    public function __invoke(Request $request, Factory $factory, TweetService $tweetService): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tweets = $tweetService->getTweets();
//        dump($tweets);
//        app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));
        return view('tweet.index')->with('tweets', $tweets)->with('name', 'END');
    }
}
