<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\FileExtension;
use Intervention\Image\Image;

class UploadImage
{
    private $image_manager;
    public $image;
    public $file_name;
    public $original_name;
    public $extension;
    public $size;
    private $base_path;

    public function __construct(UploadedFile $image)
    {
        $this->image_manager = new ImageManager(new Driver());
        $this->image = $this->image_manager->read($image->getRealPath());
        $this->file_name = (string)Str::ulid();
        $this->original_name = $image->getClientOriginalName();
        $this->extension = $image->extension();
        $this->size = $image->getSize();
        $this->base_path = storage_path('app/public');
    }

    protected function ensureDirectoryExists(string $path): void
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    public function rename(string $new_name): self
    {
        $this->file_name = $new_name;
        return $this;
    }

    public function save(string $path): string
    {
        $folder_path = $this->base_path . DIRECTORY_SEPARATOR . $path;
        $normalized_path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $folder_path);
        $this->ensureDirectoryExists($normalized_path);
        $image_file_stored_name = "{$this->file_name}.{$this->extension}";
        $full_path = $normalized_path . DIRECTORY_SEPARATOR . $image_file_stored_name;
        $this->image->save($full_path);

        return str_replace('\\', '/', "/storage/$path/$image_file_stored_name");
    }

    public function addWatermark(string $watermark_path): self
    {
        $watermark = $this->image_manager->read($watermark_path);
        $resized_watermark = $this->resizeWatermarkByImage($this->image, $watermark);
        $this->image->place($resized_watermark, 'bottom-right', 10, 10, 40);

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

    public function resizeWatermarkByImage(Image $image, Image $watermark): Image
    {
        $resizePercentage = 70; //70% less then an actual image (play with this value)
        $watermarkSize = round($image->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image
        $watermark->scale($watermarkSize, null);

        return $watermark;
    }
}
