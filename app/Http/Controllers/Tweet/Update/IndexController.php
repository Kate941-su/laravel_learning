<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Routeで{tweetId}と指定したことでRequestから$request->route('tweetId')が取得できる
        $tweetId = (int)$request->route('tweetId');
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        /*         省略しないで書くと以下のようになる
                $tweet = Tweet::where('id', $tweetId)->first();
                if (is_null($tweet)) {
                    throw new NotFoundHttpException('This tweet was not existed.');
                }
        */
        return view('tweet.update')->with('tweet', $tweet);
    }
}
