<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageTrait
{
    /**
     * @param UploadedFile $uploadedFile
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        $file = $uploadedFile
            ->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), ['disk' => $disk])
        ;

        return $file;
    }

    /**
     * @param Request $request
     * @param $folder
     * @return string
     */
    public function generateFilePath(Request $request, $folder): string
    {
        $image = $request->file('image');
        $name = Str::slug($request->input('image')) . '_' . time();
        $filePath = $name. '.' . $image->getClientOriginalExtension();

        $this->uploadOne($image, $folder, 'public', $name);

        return $filePath;
    }

    /**
     * @param null $folder
     * @param string $disk
     * @param null $filename
     */
    public function deleteOne($folder = null, $disk = 'public', $filename = null): void
    {
        Storage::disk($disk)->delete($folder.$filename);
    }

    /**
     * @param string $diskName
     * @param string $image
     * @return string
     */
    public function getUrlImage(string $diskName, string $image): string
    {
        return Storage::disk($diskName)->url($image);
    }
}
