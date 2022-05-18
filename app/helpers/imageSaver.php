<?php
    namespace App\Helpers;

    use App\Models\Image;
    use Illuminate\Support\Facades\Storage;

    class ImageSaver
    {
        public function upload($alt):Image
        {
            $file = request()->file('image');
            $uploadFolder = 'public';
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs($uploadFolder, $file, $fileName);

            return new Image([
                'url' => '/storage/'.$fileName,
                'alt' => $alt 
            ]);
        }
    }
?>
