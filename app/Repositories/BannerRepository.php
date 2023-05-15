<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository extends BaseRepository
{
    public function model(): string
    {
        return Banner::class;
    }
}
