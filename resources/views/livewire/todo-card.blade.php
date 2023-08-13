<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-3 cursor-pointer" wire:click="showTask" wire:navigate>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3>{{ $todo->title }}</h3>
        <p>{{ $todo->description }}</p>
    </div>
</div>
