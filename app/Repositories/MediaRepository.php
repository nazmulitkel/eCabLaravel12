<?php

namespace App\Repositories;

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
     * @method model()
     */
    public static function model()
    {
        //return User::class;
    }

    public static function storeByRequest(UploadedFile $file, string $path, ?string $rype = null): Media
    {
        $path = Storage::disk('public')->put('/' . trim($path, '/'), $file);
        $extension = $file->extension();
        if (!$type){
            $type = in_array($extension, ['jpeg','jpg','png','gif','svg','webp',]) ? 'image' : $extension;
        }
       $media = self::create([
        'type' => $type,
        'src' => $path,
        'name' => $file->getClientOriginalName(),
        'extension' => $extension,
            
       ]);
       return $media;
    }
}
