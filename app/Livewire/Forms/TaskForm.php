<?php

namespace App\Livewire\Forms;

use App\Models\TodoList;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Form;

class TaskForm extends Form
{
    #[Rule('required|min:3')]
    #[Url]
    public $title = '';
    #[Rule('required', message: 'Task description is required')]
    public $description = '';


    public function store(): void
    {
        TodoList::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => true,
            'user_id' => \Auth::user()->id
        ]);
    }
}
