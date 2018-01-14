<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;

class PhotosRepository
{
    public function save(UploadedFile $image)
    {
        $image->store(config('images.path'), 'public')->path();
    }
}
