<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="" class="form-group">
                    <label class="col-form-label">Album Name</label>
                    <input type="text" name="name" class="form-control">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
