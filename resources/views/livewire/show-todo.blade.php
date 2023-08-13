<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ "You are editing " . __($todo->title) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg my-3">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Task Details') }}
                        </h2>
                    </header>

                    <form wire:submit="updateTask" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                          :value="old('title', $todo->title)" required autofocus autocomplete="title"/>
                            <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                        </div>

                        <div>
                            <x-input-label for="Description" :value="__('Description')"/>
                            <x-textarea id="description" name="description" class="mt-1 block w-full"
                                        :value="$todo->description" required
                                        autocomplete="description" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'task-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
