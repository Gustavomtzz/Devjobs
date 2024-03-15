<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">

    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session('message'))
    <x-session-alerta-postulante :message="session('message')" />

    @else
    <form wire:submit.prevent='postularme' class="w-96 mt-5">
        @csrf
        <div class="mb-4 space-y-3">
            <x-label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" />
            <x-input id="cv" name="cv" type="file" wire:model='cv' accept=".pdf" />
        </div>

        @error('cv')
        <livewire:form-validation-errors :message="$message" />
        @enderror

        <x-button class="w-full justify-center">{{__('Postularme')}}</x-button>

    </form>

    @endif
</div>