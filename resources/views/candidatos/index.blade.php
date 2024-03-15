<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-bold text-center my-5">Candidatos Vacante: {{ $vacante->titulo}}</h1>
                <div class="flex md:justify-center p-5">
                    <ul class=" w-full">
                        @forelse ($vacante->candidatos as $candidato )
                        <li class="p-3 flex items-center border-b-2 border-gray-200">
                            <div class="flex-1">
                                <p class="text-xl font-medium text-gray-500">Nombre: <span
                                        class="font-normal text-gray-800">
                                        {{$candidato->user->name}} </span></p>
                                <p class="text-xl font-medium text-gray-500">Email: <span
                                        class="font-normal text-gray-800">
                                        {{$candidato->user->email}}
                                    </span></p>
                                <p class="text-xl font-medium text-gray-500">Día que se postuló:
                                    <span
                                        class="font-normal text-gray-800">{{$candidato->user->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div>
                                <a href="{{asset('storage/postulantes/'. $candidato->cv)}}"
                                    class="inline-flex items-center shadow-sm px-3 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounden-full text-gray-700 bg-white hover:bg-gray-50"
                                    target="_blank" rel="noreferrer noopener">
                                    Ver CV
                                </a>
                            </div>
                        </li>
                        @empty
                        <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>