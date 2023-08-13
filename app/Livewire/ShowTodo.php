<?php

namespace App\Livewire;

use App\Models\TodoList;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowTodo extends Component
{
    #[Url]
    #[Reactive]
    public TodoList $todo;
    public function mount(TodoList $todo){
        $this->todo = $todo;
    }

    public function render()
    {
        return view('livewire.show-todo')
            ->layout('layouts.app');
    }
}
