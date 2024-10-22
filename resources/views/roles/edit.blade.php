<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rol') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="name">{{ __('Nombre del Rol') }}</x-label>
                            <input 
                                id="name" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="name" 
                                value="{{old('name',$role->name)}}" 
                                required 
                                autofocus 
                                autocomplete="name"
                        >
                    </div> 
                    <div class="mb-4">
                        <x-label value="{{ __('Permisos') }}" />
                        <div class="mt-2">
                            @foreach ($permissions as $permission)
                                <div class="flex items-center">
                                    <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" 
                                        {{ $role->permissions->contains($permission) ? 'checked' : '' }} />
                                    <label for="permission_{{ $permission->id }}" class="ml-2">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('roles.index') }}">
                                {{ __('Cancelar') }}
                            </a>
                            <button class="bg-blue-600 text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-blue-700">
                                {{ __('Modificar Rol') }}
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
