<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $tweet = new Tweet;
        $tweet->content = $request->tweet();
        $tweet->save();
        // 'tweet.index'はRouteで指定した名前
        return redirect()->route('tweet.index');
    }
}
