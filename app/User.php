<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 記事モデルへのリレーション
    public function articles(): HasMany
    {
        return $this->hasMany('App\Article');
    }

    // likesテーブルを中間テーブルとした、Articleモデルとのリレーション（多対多）
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'likes')->withTimestamps();
    }

    // フォロー機能のためのユーザーとユーザーのリレーション
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    // フォロワーからみたフォロウィーのリレーション
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    // あるユーザーをフォロー中か判定する
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool) $this->followers->where('id', $user->id)->count()
            : false;
    }

    // ユーザーがいいねしたブログ記事を取得する
    public function getLikesArticlesAttribute()
    {
        $articles = $this->likes;

        return $articles;
    }
}
