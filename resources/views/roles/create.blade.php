<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rol') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">{{ __('Nombre del Rol') }}</label>
                    <input id="name" class="block mt-1 w-full border rounded" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                </div>

                <div class="mb-4">
                    <x-label value="{{ __('Seleccionar Permisos') }}" />
                    @foreach ($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                            <label for="permission_{{ $permission->id }}" class="ml-2">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        {{ __('Crear Rol') }}
                    </button>
                </div>

            </form>

            </div>
        </div>
    </div>
</x-app-layout>
