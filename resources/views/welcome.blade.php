<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Educación en Caraparí - Gran Chaco</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback styles/scripts -->
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <header class="py-10 text-center">
                <h1 class="text-4xl font-bold">Direccion Distrital Carapari</h1>
                <p class="mt-4">Formando futuros brillantes desde la educación inicial hasta secundaria.</p>
            </header>

            <nav class="mb-8">
                <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 bg-[#FF2D20] text-white transition hover:bg-[#e0241b] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                    Ingresar al Sistema
                </a>
                <a href="{{ route('register') }}" class="ml-4 rounded-md px-4 py-2 bg-[#FFBF00] text-white transition hover:bg-[#e0a800] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FFBF00] dark:focus-visible:ring-white">
                    Registrar
                </a>
            </nav>

            <main class="mt-6">
                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="flex flex-col items-center gap-4 rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl dark:bg-zinc-900">
                        <img src="https://images.pexels.com/photos/4144920/pexels-photo-4144920.jpeg?auto=compress&cs=tinysrgb&h=200" alt="Educación Inicial" class="h-32 w-32 rounded-full object-cover" />
                        <h2 class="text-xl font-semibold">Educación Inicial</h2>
                        <p class="mt-2 text-center">Desarrollo integral de los más pequeños, fomentando el aprendizaje lúdico.</p>
                    </div>

                    <div class="flex flex-col items-center gap-4 rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl dark:bg-zinc-900">
                        <img src="https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg?auto=compress&cs=tinysrgb&h=200" alt="Educación Primaria" class="h-32 w-32 rounded-full object-cover" />
                        <h2 class="text-xl font-semibold">Educación Primaria</h2>
                        <p class="mt-2 text-center">Fortaleciendo conocimientos básicos y valores desde una edad temprana.</p>
                    </div>

                    <div class="flex flex-col items-center gap-4 rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl dark:bg-zinc-900">
                        <img src="https://images.pexels.com/photos/4776558/pexels-photo-4776558.jpeg?auto=compress&cs=tinysrgb&h=200" alt="Educación Secundaria" class="h-32 w-32 rounded-full object-cover" />
                        <h2 class="text-xl font-semibold">Educación Secundaria</h2>
                        <p class="mt-2 text-center">Preparando a los jóvenes para enfrentar el futuro con herramientas sólidas.</p>
                    </div>
                </div>
            </main>
            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Dirección Distrital de Caraparí - Comprometidos con la Educación
            </footer>
        </div>
    </div>
</body>
</html>





