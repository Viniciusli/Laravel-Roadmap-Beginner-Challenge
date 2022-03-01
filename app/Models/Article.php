<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'article',
        'image',
        'user_id',
        'category_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];

    protected static function booted()
    {
        static::addGlobalScope('articlesWithEagerLoading', function(Builder $builder) {
            $builder->with(['category', 'tag', 'user'])->orderBy('title', 'asc');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function strimText($chars = 200)
    {
        return mb_strimwidth(strip_tags($this->article), 0, $chars, '...');
    }

    public function getArticleAttribute($value)
    {
        return ucfirst($value);
    }
}
