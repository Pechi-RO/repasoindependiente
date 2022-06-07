<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ACTUALIZAR CURSO') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex mx-auto my-auto">
            <form action="{{ route('cursos.update', $curso) }}" name="c" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="flex">
                    <x-jet-label value="Nombre"></x-jet-label>
                    <x-jet-input name="nombre" value="{{ $curso->nombre }}"></x-jet-input>
                    @error('nombre')
                        <br>
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex">
                    <x-jet-label value="Descripcion"></x-jet-label>
                    <x-jet-input name="descripcion" value="{{ $curso->descripcion }}"></x-jet-input>
                    @error('descripcion')
                        <br>
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex">
                    <x-jet-label>Activo:</x-jet-label>
                    <br>
                    @foreach ($activo as $item)

                    <x-jet-label>{{$item}}</x-jet-label>
                    @if ($item==$curso->activo)
                    <x-jet-input type="radio" name="activo" value="{{$item}}" checked></x-jet-input>
                    @else
                    <x-jet-input type="radio" name="activo" value="{{$item}}"></x-jet-input>

                    @endif

                    @endforeach

                </div>

                <div class="flex">
                    <x-jet-label>Imagen:</x-jet-label>
                    <input type="file" name="imagen" accept="image/*" id="image">
                    <img src="{{Storage::url($curso->imagen)}}" class="bg-cover bg-center" id="img">

                    @error('imagen')
                        <br>
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex mt-2 mb-2">
                    <x-jet-label>Categoria:</x-jet-label>
                    <select name="category_id">

                        @foreach ($category as $item)
                        @if ($curso->category_id==$item->id)
                        <option
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                value="{{ $curso->category_id }}" selected>{{ $item->nombre }}</option>
                        @else
                            <option
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                value="{{ $curso->category_id }}">{{ $item->nombre }}</option>
                                @endif

                        @endforeach
                    </select>


                </div>
                <x-jet-button type="submit"><i class="fa-solid fa-pen-to-square"></i>Actualizar</x-jet-button>
                <x-jet-button type="clear"><i class="fas fa-broom"></i>Reset</x-jet-button>

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
