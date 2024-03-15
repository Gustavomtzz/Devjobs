<div class="p-10 text-center md:text-left">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Empresa: <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Último dia para postularse: <span
                    class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Categoría: <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>


            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Salario: <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>


        </div>

    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img class="mx-auto md:mx-0" src="{{asset('storage/vacantes/'. $vacante->imagen)}}" alt="">
        </div>
        <div class="md:col-span-4 mt-5">
            <h2 class="text-2xl font-bold mb-2">Descripción del Puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
        <p>
            ¿Deseas aplicar a esta vacante?
            <a href="{{ route('register')}}" class="text-indigo-600">Obten una cuenta y aplica a esta y otras
                vacantes</a>
        </p>
    </div>
    @endguest

    @auth
    @cannot('create', App\Models\Vacante::class)
    @livewire('PostularVacante', ['vacante' => $vacante])
    @endcannot
    @endauth

</div>