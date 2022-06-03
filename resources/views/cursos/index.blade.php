<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CURSOS') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <x-plantilla>
            <x-slot name="slot">
                <div class="flex flex-row-reverse">
                    <a href="{{route('cursos.create')}}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"> NUEVO</i></a>
                </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" colspan="2" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Activo
                            </th>
                            <th scope="col" colspan="2" class="px-6 py-3">
                                Acciones
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $item)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                <a href="{{route('cursos.show',$item)}}">{{$item->id}}</a>
                            </td>

                            <th colspan="2" scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap content-center">
                                <div class="flex ">
                                <img class="w-10 h-10 rounded-full" src="{{Storage::url($item->imagen)}}" alt="Imagen">
                                {{$item->nombre}}
                            </div>
                            </th>
                            <td class="px-6 py-4 @if ($item->activo=="SI") text-blue-700 @else text-red-700 @endif">
                                {{$item->activo}}
                            </td>
                            <td colspan="2" class="px-6 py-4">
                                Acciones
                            </td>


                        </tr>
                        @endforeach

                        <div class="mt-2">

                            {{ $cursos->links() }}
                        </div>
                    </tbody>

                </table>

            </x-slot>
        </x-plantilla>

    </x-slot>

    @if(session('info')){
        <script>
            Swal.fire({
          title: info,
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })
        </script>
        }@endif
</x-app-layout>
