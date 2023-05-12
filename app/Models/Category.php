<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(fn($category)=> $category->slug = Str::slug($category->name));
    }
}
