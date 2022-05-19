<?php
    namespace App\Helpers;

    use App\Models\Image;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\DB;

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
        public function update($imageId, $newImage, $alt)
        {
            $file = request()->file('image');
            $uploadFolder = 'public';
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs($uploadFolder, $file, $fileName);

            DB::table('images')->where('id', $imageId)->update([
                'url' => '/storage/'.$fileName,
                'alt' => $alt 
            ]);
        }
    }
?>
