<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\TodoList as ModelsTodoList;
use Livewire\Attributes\On;
use Livewire\Component;

class TodoList extends Component
{
    public bool $disableSaveForm = false;
    public bool $show = false;
    public $todos = [];

    public int $todosCount = 0;

    public TaskForm $taskForm;

    public function mount(): void
    {
        $this->todosCount = ModelsTodoList::where('status', 1)->count();
        $this->todos = \Auth::user()->todos;
    }

    public function showModal(): void
    {
        $this->show = true;
    }

    public function hideModal(){
        $this->show = false;
    }

    public function disableButton(): void
    {
        $this->disableSaveForm = true;
    }

    public function enableButton(): void
    {
        $this->disableSaveForm = false;
    }


    public function save()
    {
        $this->validate();
        $this->disableButton();
        $this->taskForm->store();
        $this->hideModal();
        // Dispatch the event to trigger a re-render
        $this->taskCreated();
    }

    public function taskCreated(){
        $this->todos = \Auth::user()->todos;
        $this->render();
    }


    public function render()
    {
        return view('livewire.todo-list');
    }
}
