<?php
namespace App\Traits;

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait HandleImage {

    const DISK = 'image';
    const QUANTITY_IMAGE = 80;

    public function verify($image): bool
    {
        return !empty($image);
    }

    public function saveImage($image): string|null
    {
        if ($this->verify($image)){
            $extension = $image->getClientOriginalExtension();
            $image = Image::make($image)->encode($extension, self::QUANTITY_IMAGE);
            $nameImage = time() . '.' .$extension;
            Storage::disk(self::DISK)->put($this->getPathSave($nameImage), $image);
            return $nameImage;
        }
        return null;
    }

    public function updateImage($image, $imageCurrent): string
    {
        if ($this->verify($image)){
            $this->deleteImage($imageCurrent);
            return $this->saveImage($image);
        }
        return $imageCurrent;
    }

    public function deleteImage($imageCurrent)
    {
        if ($this->exitsImage($imageCurrent) && !empty($imageCurrent)) {
            Storage::disk(self::DISK)->delete($this->getPathSave($imageCurrent));
        }
    }

    public function exitsImage($name): bool
    {
        return Storage::disk(self::DISK)->exists($this->getPathSave($name));
    }


    public function getFullPath($name): string
    {
       return Storage::disk(self::DISK)->url($this->getPathSave($name));
    }

    public function getPathSave($name): string
    {
        return $this->folder . '/' . $name;
    }
}
