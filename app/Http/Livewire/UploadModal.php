<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class UploadModal extends Component
{
    use WithFileUploads;
    use Actions;
    public $uploadModal = false;
    public $photo;
    
    public function save()
    {
        $validator = Validator::make(
            [
                'photo'  => $this->photo,
            ],
            [
                'photo' => 'image|max:1024', // 1MB Max
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            $this->uploadModal = false;
            return;
        }

        $validator->validate();
 
        $user = Auth::user();
        $media = $user->addMedia($this->photo) //starting method
                        ->toMediaCollection('my-collection');
        unlink($media->getPath());
        $this->uploadModal = false;
        $this->notify('Image saved!','Your profile image was successfull saved', 'success', 'refreshPage');
       
        return ;
    }

    public function refreshPage()
    {
        $this->dispatchBrowserEvent('refresh-page');
    }
    public function dontRefreshPage()
    {
        // $this->dispatchBrowserEvent('refresh-page');
    }

    public function notify($title, $desc, $icon, $method)
    {
        return  $this->notification([
            'title'       => $title,
            'description' => $desc,
            'icon'        => $icon,
            'timeout'     => 2500,
            'onTimeout' => [
                'method' => $method,
                'params' => ['onTimeout', 'more value'],
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.upload-modal');
    }
}
