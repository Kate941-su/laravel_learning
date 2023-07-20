<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TweetService
{
    public function getTweets(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Tweet::with('images')->orderBy('created_at', 'DESC')->get();
    }

    // 自分のツイートかどうかをチェックするメソッド
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        print_r($tweet->user_id == $userId);
        if (!$tweet) {
            return false;
        }
        return $tweet->user_id === $userId;
    }

    public function countYesterdayTweets(): int
    {
        return Tweet::whereDate(
            'created_at', '>=', Carbon::yesterday()->toDateTimeLocalString()
        )->whereDate('created_at', '<', Carbon::today()->toDateTimeLocalString())->count();
    }


    public function saveTweet(int $userId, string $content, array $images): void
    {
        DB::transaction(function () use ($userId, $content, $images){
           $tweet = new Tweet;
           $tweet->user_id = $userId;
           $tweet->content = $content;
           $tweet->save();
           foreach ($images as $image) {
               Storage::putFile('public/images', $image);
               $imageModel = new Image();
               $imageModel->name = $image->hashName();
               $imageModel->save();
               $tweet->images()->attach($imageModel->id);
           }
        });
    }

    public function deleteTweet(int $tweetId) {
        DB::transaction(function () use ($tweetId) {
           $tweet = Tweet::where('id', $tweetId)->firstOrFail();
           $tweet->images()->each(function ($image) use ($tweet){
               $filePath = 'public/images/' . $image->name;
               if(Storage::exists($filePath)) {
                   Storage::delete($filePath);
               }
               $tweet->images()->detach($image->id);
               $image->delete();
           });
           $tweet->delete();
        });
    }


}
