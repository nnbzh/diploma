<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
    public function createForImageable($imageable, $images)
    {
        $images = is_array($images) ? $images : [$images];

        foreach ($images as $image) {
            $folder = $imageable->getTable();
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs("images/$folder/$imageable->id", $filename, ['disk' => 'public']);
            $imageable->images()->create([
                'location' => $path
            ]);
        }
    }
}
