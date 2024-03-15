<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-bold text-center my-5">Mis Notificaciones</h1>
                <div class="flex md:justify-center p-5">
                    <div class="flex-col justify-between items-center w-full">
                        @forelse ($notificaciones as $notificacion )
                        <div class="md:flex md:justify-between md:items-center p-3 border-b-2 border-gray-200 my-4">
                            <div>
                                <p>Tienes un nuevo candidato en:
                                    <span
                                        class="font-bold uppercase text-sm">{{$notificacion->data["nombre_vacante"]}}</span>
                                </p>
                                <p class="font-bold">{{$notificacion->created_at->diffForHumans()}} </p>
                            </div>

                            <x-link href="{{ route( 'candidatos.index', $notificacion->data['id_vacante'] ) }}"
                                class="block text-center bg-indigo-700 text-white my-3 md:my-0 py-2 px-3 w-full md:w-auto cursor-pointer">
                                Ver Candidatos
                            </x-link>
                        </div>
                        @empty
                        <p class="text-center text-gray-600">No hay Notificaciones a mostrar</p>
                        @endforelse
                    </div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h2 class="text-center text-2xl font-bold">Historial Notificaciones</h2>
                <div class="flex-col justify-between items-center w-full">
                    @forelse ($allNotificaciones as $notificacion )
                    <div class="md:flex md:justify-between md:items-center p-3 shadow-lg my-4">
                        <div>
                            <p>Tienes un nuevo candidato en:
                                <span
                                    class="font-bold uppercase text-sm">{{$notificacion->data["nombre_vacante"]}}</span>
                            </p>
                            <p class="font-bold">{{$notificacion->created_at->diffForHumans()}} </p>
                        </div>

                        <x-link href="{{ route( 'candidatos.index',$notificacion->data['id_vacante'] ) }}"
                            class="block text-center bg-indigo-700 text-white my-3 md:my-0 py-2 px-3 w-full md:w-auto cursor-pointer">
                            Ver Candidatos
                        </x-link>
                    </div>
                    @empty
                    <p class="text-center text-gray-600">No hay Notificaciones a mostrar</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>