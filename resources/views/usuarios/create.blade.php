<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input type="text" name="name" class="border rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="border rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Contraseña</label>
                        <input type="password" name="password" class="border rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700">Rol</label>
                        <select name="role" class="border rounded w-full" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
