<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editá tu vacante aquí') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-bold text-center my-5">{{$vacante->titulo}}</h1>
                <div class="flex md:justify-center p-5">
                    @livewire('editar-vacante', ['vacante' => $vacante])
                </div>
            </div>
        </div>
    </div>

</x-app-layout>