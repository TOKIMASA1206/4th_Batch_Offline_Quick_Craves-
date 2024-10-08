<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{

    function uploadImage(Request $request, $inputName)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);

            $imageData = file_get_contents($image->getRealPath());

            $mimeType = $image->getClientMimeType();

            $base64 = base64_encode($imageData);

            $base64String = 'data:' . $mimeType . ';base64,' . $base64;

            return $base64String;
        }

        return null;
    }

    function removeImage(string $path): void
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
