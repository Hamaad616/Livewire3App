<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{  $todos->count() > 0 ? $todos->count() . __(" task(s) todo") : __("No tasks todo") }}
            <x-secondary-button wire:click="showModal" class="float-right">
                ➕ Start Adding
            </x-secondary-button>
        </div>

        <form wire:submit="save" class="create-task">
            <x-modal.dialog name="AddTaskModal" wire:model.defer="show">
                <x-slot name="title">Add Task</x-slot>
                <x-slot name="content">
                    <div class="grid grid-cols-1 mb-3">
                        <x-text-input name="title" class="@error('taskForm.title') error @enderror" wire:model.live="taskForm.title" placeholder="Title"/>
                        @error('taskForm.title')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1">
                        <x-textarea name="description" class="@error('taskForm.description') error @enderror" wire:model.blur="taskForm.description" placeholder="Description"/>
                        @error('taskForm.description')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex gap-2">
                        <x-secondary-button wire:click="hideModal">
                            Cancel
                        </x-secondary-button>

                        <x-primary-button :disabled="$disableSaveForm" >
                            Save
                        </x-primary-button>
                    </div>
                </x-slot>
            </x-modal.dialog>
        </form>
    </div>

    @foreach($todos as $todo)
        <livewire:todo-card :$todo :key="$todo->id" lazy/>
    @endforeach
</div>




