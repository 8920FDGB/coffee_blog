<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
