<?php

namespace App\Models;

use App\Enums\BannerPosition;
use App\Traits\HandleImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory, HandleImage;
    protected $table = 'banners';
    protected $fillable = [
        'title', 'slug', 'content', 'image', 'position', 'time_start', 'time_end', 'status'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(fn($banner)=> $banner->slug = Str::slug($banner->title));
    }

    public function folder(): Attribute
    {
        return Attribute::make(
          get: fn() => 'banners',
          set: fn($folder) => $folder
        );
    }

    public function fullPathImage(): Attribute
    {
        return Attribute::make(
          get: fn() => $this->getFullPath($this->image)
        );
    }

    public function positionBanner(): Attribute
    {
        return Attribute::make(
          get: fn() => BannerPosition::getDescription($this->position)
        );
    }

}
