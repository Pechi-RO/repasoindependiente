<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CREAR CURSOS') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex mx-auto my-auto">
        <form action="{{route('cursos.store')}}" name="c" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="flex">
            <x-jet-label value="Nombre"></x-jet-label>
            <x-jet-input name="nombre" value="{{old('nombre')}}"></x-jet-input>
            @error('nombre')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>
        <div class="flex">
            <x-jet-label value="Descripcion"></x-jet-label>
            <x-jet-input name="descripcion" value="{{old('descripcion')}}"></x-jet-input>
            @error('descripcion')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>

        <div class="flex">
            <x-jet-label>Activo:</x-jet-label>
            <br>
            <x-jet-label>SI</x-jet-label>
            <x-jet-input type="radio" name="activo" value="1"></x-jet-input>
            <x-jet-label>NO</x-jet-label>
            <x-jet-input type="radio" name="activo" value="2"></x-jet-input>

        </div>

        <div class="flex">
            <x-jet-label>Imagen:</x-jet-label>
            <input type="file" name="imagen"  accept="image/*" id="image" >
            <img src="/storage/noimage.png" class="bg-cover bg-center" id="img">



        </div>

        <x-jet-button type="submit" ><i class="fas fa-save"></i>Crear</x-jet-button>
        <x-jet-button type="clear" ><i class="fas fa-broom"></i>Reset</x-jet-button>

        </form>
    </div>

    <script>
        //Cambiar imagen
        document.getElementById("image").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload=(event)=>{
                document.getElementById("img").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
        }
    </script>


    </x-slot>


</x-app-layout>
