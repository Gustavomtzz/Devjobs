<form class="md:w-1/2 space-y-5" wire:submit.prevent="editarVacante">

    <div>
        <x-label for="titulo" :value="__('Titulo Vacante')" />

        <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Titulo Vacante" />
        <div>
            @error('titulo')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div>
        <x-label for="salario_id" :value="__('Salario Mensual')" />

        <select wire:model="salario_id" id="salario_id" class="block mt-1 w-full">
            <option value="" selected>{{__('--Seleccione un Salario--')}}</option>
            @foreach ($salarios as $salario )
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        <div>
            @error('salario_id')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div>
        <x-label for="categoria_id" :value="__('Categoria')" />

        <select wire:model="categoria_id" id="categoria_id" class="block mt-1 w-full">
            <option value="" selected>{{__('--Seleccione una Categoria--')}}</option>
            @foreach ($categorias as $categoria )
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        <div>
            @error('categoria_id')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div>
        <x-label for="empresa" :value="__('Empresa')" />

        <x-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: Ej, Netflix, Uber, Shopify" />
        <div>
            @error('empresa')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div>
        <x-label for="ultimo_dia" :value="__('Último Día para postularse')" />

        <x-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        <div>
            @error('ultimo_dia')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div>
        <x-label for="descripcion" :value="__('Descripción')" />

        <textarea wire:model="descripcion" placeholder="Descripción general del puesto, experiencia"
            class="block mt-1 w-full h-36"> </textarea>
        <div>
            @error('descripcion')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>
    <div>
        <x-label for="imagen" :value="__('Imagen')" />
        <div class="flex gap-2 items-center">
            <x-input id="imagen" class="block mt-1 w-full" type="file"
                accept=".jpg, .jpeg, .png, .bmp, .gif, .svg, .webp" wire:model="imagen" />
            @if (!$this->imagen)
            <img src="{{ asset('storage/vacantes/' . $imagenAnterior) }}" class="h-20 w-20"
                alt="{{'Imagen Vacante ' . $titulo}}">
            @else
            <img src="{{$imagen->temporaryUrl()}}" class="h-20 w-20" alt="{{'Imagen Vacante ' . $titulo}}">
            @endif
        </div>

        <div>
            @error('imagen')
            <livewire:form-validation-errors :message="$message" /> @enderror
        </div>
    </div>

    <div class="relative h-10">
        <x-button class="right-0 absolute bg-orange-400 hover:bg-orange-500">Actualizar Vacante</x-button>
    </div>
</form>