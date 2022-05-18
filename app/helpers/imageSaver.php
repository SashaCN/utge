<?php
    namespace App\Helpers;

    use App\Models\Image;
    use Illuminate\Support\Facades\Storage;

    class ImageSaver
    {
        public function upload():Image
        {
            $file = request()->file('image');
            $uploadFolder = 'public';
            $fileName = $file->getClientOriginalName();
            $dblink = 'storage';

            Storage::putFileAs($uploadFolder, $file, $fileName);

            return new Image(['url' => $dblink.'/'.$fileName]);
        }
    }
?>
