<?php

namespace App\Http\Livewire;

use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLinks extends Component
{
    use WithPagination;

    public $shorLink = ShortLink::class;

    public function deleteLink($id) {
        //dd('asdasdad');
        //ShortLink::whereId($id)->first()->delete();
    }

    public function render()
    {
        $user = Auth::user();

        $shortLinks = ShortLink::where('user_id','=',$user->id)->get();
        return view('livewire.show-links',['shortLinks' => $shortLinks]);
    }
}
