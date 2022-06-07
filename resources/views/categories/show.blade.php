<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MOSTRAR CATEGORIAS') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <x-plantilla>
            <x-slot name="slot">

<a href="#" class="mx-auto block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category->nombre}}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{$category->descripcion}}</p>

    </a>
    <a href="{{route('categories.index')}}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-home"> Inicio</i></a>


            </x-slot>

        </x-plantilla>
    </x-slot>
</x-app-layout>
