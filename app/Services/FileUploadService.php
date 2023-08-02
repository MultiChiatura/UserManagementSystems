<?php

namespace App\Services;

use Illuminate\Support\Str;

class FileUploadService
{
    public function fileUpload($file){
        $mime = $file->getClientOriginalExtension();
        $originalTitle = $file->getClientOriginalName();

        $newName = Str::random(64).'.'.$mime;

        $path = $file->storeAs(
            'imgs',
            $newName,
            'public'
        );

        return [
            'title' => $originalTitle,
            'path' => "/storage/".$path
        ];
    }
}
