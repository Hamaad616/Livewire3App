<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use \App\Models\TodoList;
use Livewire\Component;

class TodoCard extends Component
{
    #[Url]
    #[Reactive]
    public TodoList $todo;
    public function mount(TodoList $todo){
        $this->todo = $todo;
    }

    public function placeholder(){
        return <<<'HTML'
        <div role="status" class="max-w-sm animate-pulse">
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
            <span class="sr-only">Loading...</span>
        </div>
        HTML;
    }

    public function showTask(){
        return $this->redirect(route('todo.show', ['todo' => $this->todo]), navigate: true);
    }

    public function render()
    {
        return view('livewire.todo-card');
    }
}
