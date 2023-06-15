<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TweetFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereUpdatedAt($value)
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereUserId($value)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

}
