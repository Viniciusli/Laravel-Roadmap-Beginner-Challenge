<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('orderByName', function(Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
    }
}
