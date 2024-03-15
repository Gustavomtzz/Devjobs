<div>
    @switch($message)
    @case('vacante-creada')
    <div class="mb-4 p-2 font-bold uppercase border-l-4 border-green-500 text-green-600
    bg-green-100">
        {{ __('La vacante se registro correctamente.')
        }}
    </div>
    @break

    @case('vacante-actualizada')
    <div class="mb-4 p-2 font-bold uppercase border-l-4 border-orange-500 text-orange-600
bg-orange-100">
        {{ __('La vacante se actualizo correctamente.')
        }}
    </div>

    @break
    @endswitch
</div>