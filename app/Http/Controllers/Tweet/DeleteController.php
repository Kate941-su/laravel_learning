<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use function Psy\debug;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int)$request->route('tweetId');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }
        $tweetService->deleteTweet($tweetId);
        // 👆と同じで削除処理を行う
        // Tweet::destory($tweetId);
        return redirect()->route('tweet.index')->with('feedback.success', "つぶやきを削除しました！");
    }
}
