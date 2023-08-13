<?php

namespace App\Livewire\Profile;

use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public $show = false;

    public function render(Request $request)
    {
        return view('livewire.profile.edit', [
            'user' => $request->user(),
        ])->layout('layouts.app');
    }
}
