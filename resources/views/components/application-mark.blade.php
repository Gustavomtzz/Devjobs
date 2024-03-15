<a href="{{route('vacantes.index')}}">
  <img {{$attributes->merge([
  'class' => 'h-20 w-20 rounded-full object-cover',
  ])}}
  src="{{ asset('storage/devjobs.png') }}" alt="DevJobs" />
</a>