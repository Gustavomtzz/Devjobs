@if ($errors->any())
<div {{ $attributes }}>
    <div class="font-medium text-red-600">{{ __('Alerta! Ocurrio un error.') }}</div>

    <ul class="mt-3 list-inside text-sm text-red-600 list-none space-y-2">
        @foreach ($errors->all() as $error)
        <li class="bg-red-100 border-l-4 border-red-600 text-red-600 font-bold p-3">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif