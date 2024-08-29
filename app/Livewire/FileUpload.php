<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileUpload extends Component
{


    use WithFileUploads;
    public $photos = [];
// .....................upload....................
    public function save()
    {
        try {
                $this->validate([
                    'photos.*' => 'image|max:1024', // 1MB Max
                ]);

                foreach ($this->photos as $photo) {
                    // $path = $photo->store('photos', 'public');
                    $files = $photo->file('photos');
                    $filename = time().'.'.$files->getClientOriginalName();
                    $files->move('photos/image',$filename);
                }

                $this->reset('photos');
                session()->flash('message', 'Files uploaded successfully.');
        }
        catch (\Exception $e) {
            session()->flash('error', 'Failed to upload photo: ' . $e->getMessage());
        }

    }

    // ...............delete file.......
    public function delete($fileName)
        {

            try {
                // Specify the directory path
                $publicPath = public_path('photos/image');

                // Construct the full path to the file
                $filePath = $publicPath . '/' . $fileName;

                // Check if the file exists before attempting to delete it
                if (File::exists($filePath)) {
                    File::delete($filePath);

                    // Provide feedback to the user
                    session()->flash('message', 'Photo deleted successfully.');
                } else {
                    session()->flash('error', 'File does not exist.');
                }

            } catch (\Exception $e) {
                session()->flash('error', 'Failed to delete photo: ' . $e->getMessage());
            }
        }
    // ...............view...........

    public function render()
    {
         // Specify the directory path
    $publicPath = public_path('photos/image');

    // Get all files within the 'photos/image' directory
    $files = File::allFiles($publicPath);

    // Define allowed image extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Filter files to only include images
    $imageFiles = array_filter($files, function($file) use ($allowedExtensions) {
        return in_array($file->getExtension(), $allowedExtensions);
    });

    // Get only the filenames
    $imageNames = array_map(function($file) {
        return $file->getFilename();
    }, $imageFiles);


        return view('livewire.file-upload',[
            'files' => $imageNames
        ]);
    }
}
