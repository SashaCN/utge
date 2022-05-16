<?php 
    namespace App\Helpers\ImageSaver;

    use App\Models\Image;
    use Illuminate\Support\Facades\Storage;

    class ImageSaver
    {
        public function upload():Image
        {
            $file = request()->file('image');
            $uploadFolder = 'storage/folder';
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs($uploadFolder, $file, $fileName);

            return new Image(['url' => $uploadFolder.'/'.$fileName]);
        }
    }
?>