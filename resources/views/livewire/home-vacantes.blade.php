<div>

    @livewire('filtrar-vacantes')
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12 text-center">Nuestras Vacantes Disponible</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-300">

                @forelse ($vacantes as $vacante)

                <div class="md:flex md:justify-between md:items-center py-5">

                    <div class="md:flex-1">
                        <a class="text-xl font-extrabold text-gray-600"
                            href="{{route('vacantes.show',$vacante)}}">{{$vacante->titulo}}</a>
                        <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                        <p class="font-bold text-xs text-gray-600">
                            Último dia para postularse:
                            <span>
                                {{$vacante->ultimo_dia->format('d/m/Y')}}
                            </span>
                        </p>
                        <p class="font-bold text-xs text-gray-600">
                            {{$vacante->categoria->categoria}}
                        </p>
                        <p class="font-bold text-xs text-gray-600">
                            {{$vacante->salario->salario}}
                        </p>
                    </div>

                    <div>
                        <x-link
                            class="block text-center bg-indigo-700 text-white my-3 md:my-0 py-2 px-3 w-full md:w-auto cursor-pointer"
                            href="{{route('vacantes.show',$vacante)}}">
                            Ver Vacante</x-link>
                    </div>
                </div>
                @empty
                <p class="text-center text-sm text-gray-600 p-3">No hay vacantes aún </p>
                @endforelse

            </div>
        </div>
    </div>
</div>