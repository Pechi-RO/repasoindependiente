<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ACRUALIZAR CATEGORIAS') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex mx-auto my-auto">
        <form action="{{route('categories.update',$category)}}" name="c" method="POST" >
            @method('PUT')
            @csrf
            <div class="flex">
            <x-jet-label value="Nombre"></x-jet-label>
            <x-jet-input name="nombre" value="{{$category->nombre}}"></x-jet-input>
            @error('nombre')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>
        <div class="flex">
            <x-jet-label value="Descripcion"></x-jet-label>
            <x-jet-input name="descripcion" value="{{$category->descripcion}}"></x-jet-input>
            @error('descripcion')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>
        <x-jet-button type="submit" ><i class="fa-solid fa-pen-to-square"></i>Actualizar</x-jet-button>
        <x-jet-button type="clear" ><i class="fas fa-broom"></i>Reset</x-jet-button>

        </form>
    </div>

    </x-slot>


</x-app-layout>
