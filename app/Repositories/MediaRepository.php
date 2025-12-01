<?php

namespace App\Repositories;

// use App\Models\Category;
use App\Models\Media;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository extends Repository
{
    /**
     * base method
     *
    //  * @method model()
     */
    // public static function model()
    // {
    //     return Media::class;
    // }

    // public static function storeByRequest(UploadedFile $file, string $path, ?string $rype = null): Media
    // {
    //     $path = Storage::disk('public')->put('/' . trim($path, '/'), $file);
    //     $extension = $file->extension();
    //     if (!$type){
    //         $type = in_array($extension, ['jpeg','jpg','png','gif','svg','webp',]) ? 'image' : $extension;
    //     }

    //    $media = self::create([
    //     'type' => $type,
    //     'src' => $path,
    //     'name' => $file->getClientOriginalName(),
    //     'extension' => $extension,

    //    ]);

    //    return $media;
    // }
    public static function model()
    {
        return Media::class;
    }

    public static function storeByRequest(UploadedFile $file, string $path, ?string $type = null): Media
    {
        // Save file
        $savedPath = Storage::disk('public')->put(trim($path, '/'), $file);

        // Get extension
        $extension = $file->extension();

        // Auto-detect type if not provided
        if (!$type) {
            $imageExtensions = ['jpeg', 'jpg', 'png', 'gif', 'svg', 'webp'];
            $type = in_array(strtolower($extension), $imageExtensions)
                ? 'image'
                : $extension;
        }

        // Create media record
        return self::create([
            'type'      => $type,
            'src'       => $savedPath,
            'name'      => $file->getClientOriginalName(),
            'extension' => $extension,
        ]);
    }


    public static function updateByRequest(UploadedFile $file, string $path, ?string $type = null, Media $media): Media
    {
        $path = Storage::disk('public')->put('/' . trim($path, '/'), $file);
        $extension = $file->extension();
        if (!$type) {
            $type = in_array($extension, ['jpeg', 'jpg', 'png', 'gif','svg', 'webp']) ? 'image' : $extension;
        }

        if(Storage::exists($media->src)){
            Storage::delete($media->src);
        }

        $media->update([
            'type' => $type,
            'src' => $path,
            'name' => $file->getClientOriginalName(),
            'extension' => $extension
        ]);

        return $media;

    }


}
