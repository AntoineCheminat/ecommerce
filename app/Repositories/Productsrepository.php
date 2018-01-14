<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;

class ProductsRepository
{
    public function save(UploadedFile $image)
    {
        $image->store(config('images.path'), 'public');
        $file = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $path = $image->hashName();
        $data = array (
            'file' => $file,
            'path' => $path
        );
        return $data;
    }
}
