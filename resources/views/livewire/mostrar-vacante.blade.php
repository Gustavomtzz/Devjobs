<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    @forelse ($vacantes as $vacante )
    <ul class="my-5 shadow-xl shadow-gray-300 p-5 md:flex md:justify-start md:items-center md:gap-4">
        <img src="{{asset('storage/vacantes/'. $vacante->imagen)}}" alt="{{$vacante->titulo}}"
            class="h-50 m-auto md:m-0 md:h-24 w-auto">
        <div class="space-y-2 mt-4 ">
            <a href="{{ route('vacantes.show',['vacante'=> $vacante]) }}"
                class="text-2xl font-bold text-slate-700 hover:text-slate-900 ">{{$vacante->titulo}} </a>
            <div>
                <li class="font-bold">Empresa: <span class="font-normal text-slate-600">{{$vacante->empresa}}</span>
                </li>
                <li class="font-bold">Descripción:<span
                        class="font-normal text-slate-600">{{$vacante->descripcion}}</span></li>
                <li class="text-gray-600">Ultimo dia: <span
                        class="font-normal text-slate-600">{{$vacante->ultimo_dia->format('d/m/Y')}}</span></li>
            </div>
            <div class="py-2 flex flex-col gap-2 md:flex-row text-center">
                <a href="{{ route('candidatos.index', $vacante)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                    {{ $vacante->candidatos->count()}}
                    Candidatos
                </a>
                <a href="{{route('vacantes.edit',$vacante)}}"
                    class="bg-orange-400 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">Editar</a>
                <button wire:click="$dispatch('mostrarAlerta' , {{ $vacante->id }} )" class="bg-red-800 py-2 px-4 rounded-lg text-white
                    text-sm font-bold uppercase">Eliminar</button>
            </div>
        </div>
    </ul>
    <div class="p-2"> {{$vacantes->links()}}</div>
    @empty
    <ul class="list-inside text-sm text-blue-600 list-none space-y-2 uppercase">
        <li class="bg-blue-100 border-l-4 border-blue-500  font-bold p-3">No hay vacantes creadas. Creá una <a
                href="{{route('vacantes.create')}}" class="text-blue-900 hover:text-black">Presionando Aquí</a></li>
    </ul>
    @endforelse

</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Mostrar Sweet Alert --}}
<script>
    Livewire.on('mostrarAlerta', vacanteID => {
    Swal.fire({
            title: "¿Quieres elíminar la vacante?",
            text: "Una vacante eliminada no se puede recuperar.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡Eliminar!",
            cancelButtonText: "Cancelar"
                }).then((result) => {
        if (result.isConfirmed) {
            //Enviar ID al Controlador de livewire
            Livewire.dispatch('destroy',{ vacante:vacanteID })

            Swal.fire({
            title: "Vacante Eliminada!",
            text: "La vacante se eliminó correctamente.",
            icon: "success"
        });
        }
        });
    })   
</script>

@endpush