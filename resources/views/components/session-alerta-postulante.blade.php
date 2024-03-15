<div>
    @switch($message)
    @case('postulante-creada')
    <div class="mb-4 p-2 font-bold uppercase border-l-4 border-green-500 text-green-600
        bg-green-100">
        {{ __('Se envió correctamente tu información.Mucha suerte!')
        }}
    </div>
    @break

    @case('postulante-duplicado')
    <div class="mb-4 p-2 font-bold uppercase border-l-4 border-red-500 text-red-600
    bg-red-100">
        {{ __('Ya postulaste a esta vacante anteriormente. En caso de enviar erroneamente el CV, contactanós.')
        }}
    </div>
    @break
    @endswitch
</div>