<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CATEGORIAS') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <x-plantilla>
            <x-slot name="slot">
                <div class="flex flex-row-reverse">
                <a href="{{route('categories.create')}}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"> NUEVO</i></a>
            </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 ">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripción
                            </th>
                            <th scope="col" colspan="2" class="px-6 py-3">
                                Acciones
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap content-center">
                            <div class="flex"><button class=" rounded-full bg-red-600"> <a href="{{route('categories.show',$item)}}">
                            {{$item->id}}</button>
                        </div></a>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap content-center">
                                <div class="flex ">
                                {{$item->nombre}}
                            </div>
                            </th>
                            <td class="px-6 py-4">
                                {{$item->descripcion}}
                            </td>
                            <td colspan="2" class="px-6 py-4">
                                <form action="{{route('categories.destroy',$item)}}" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <div class="flex">
                                    <x-jet-button><i class="fas fa-trash "></i> Borrar</x-jet-button>

                            </form>
                            <a href="{{route('categories.edit',$item)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fa-solid fa-pen-to-square"></i>Update</a>
                        </div>
                        </td>


                        </tr>
                        @endforeach


                    </tbody>

                </table>

            </x-slot>
        </x-plantilla>

    </x-slot>


</x-app-layout>
