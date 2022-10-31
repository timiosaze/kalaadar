<?php

namespace App\Http\Livewire;

use App\Models\Userbio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use WireUi\Traits\Actions;

class AccountForm extends Component
{
    use Actions;
    public $timezone = null;
    public $country = null;
    public $biodata = null;
    public $name;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->user->load('userbio'); //load it
        if($bio = $this->user->userbio){ //no () and binding it to a variable
            $this->timezone = $bio->timezone;
            $this->country = $bio->country;
            $this->biodata = $bio->biodata;
        }
        $this->name = $this->user->name;
    }

    public function upload()
    {

    }

    public function save()
    {
        $user = Auth::user();
        $user->name = $this->name;
        $user->save();
        Userbio::updateOrCreate(['user_id' => $user->id], [
            'timezone' => $this->timezone, 
            'country' => $this->country,
            'biodata' => $this->biodata
        ]);
        
        $this->notify('Success', 'Your biodata was saved successfully', 'success', 'dontRefreshPage');

        return;

    }
  
    public function remove()
    {
        $id = $this->user->getMedia('my-collection')[0]->id;
        Media::where('id', $id)->delete();
        $this->notify('Success', 'Your avatar was removed successfully', 'success', 'refreshPage');

        return;
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
        return view('livewire.account-form');
    }
}
