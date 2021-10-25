<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];

    // Userモデルへのリレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    // Categoryモデルへのリレーション
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Category');
    }

    // likesテーブルを中間テーブルとした、Userモデルとのリレーション（多対多）
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    // あるユーザーがいいね済みかどうかを判定する
    public function isLikedBy(?User $user)
    {
        return $user
            ? (bool) $this->likes->where('id', $user->id)->count()
            : false;
    }
}
