<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\FileExtension;
use Intervention\Image\Image;

class UploadImage extends Uploader
{
    private ImageManager $imageManager;
    private Image $image;

    public function __construct(UploadedFile $file)
    {
        parent::__construct($file);

        $this->imageManager = new ImageManager(new Driver());
        $this->image = $this->imageManager->read($file->getRealPath());
    }

    public function save(string $path): string
    {
        $path = trim($path, '/');
        $fileName = $this->newFileName ?? (string)Str::ulid() . '.' . $this->extension;
        $filePath = $path . '/' . $fileName;

        Storage::disk($this->disk)->put(
            $filePath,
            $this->image->encodeByExtension($this->extension, quality: 70)
        );

        return $this->storageUrl($this->disk, $filePath);
    }

    public function addWatermark(string $watermarkPath): self
    {
        $watermark = $this->imageManager->read($watermarkPath);
        $resizedWatermark = $this->resizeWatermarkByImage($this->image, $watermark);
        $this->image->place($resizedWatermark, 'bottom-right', 10, 10, 40);

        return $this;
    }

    public function resize(?int $width = null, ?int $height = null): self
    {
        $this->image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $this;
    }

    public function encodeToFormat(FileExtension $extension, int $quality = 100): self
    {
        $this->image->encodeByExtension($extension, quality: $quality);
        $this->extension = $extension->value;

        return $this;
    }

    private function resizeWatermarkByImage(Image $image, Image $watermark): Image
    {
        $resizePercentage = 70; // 70% меньше реального изображения
        $watermarkSize = $image->width() * ((100 - $resizePercentage) / 100);
        $watermark->scale($watermarkSize, null);

        return $watermark;
    }
}
