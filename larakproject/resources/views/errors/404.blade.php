@extends('layouts.single-page')

@section('content')

<div class="text-center">
      <img
          class="mb-4"
          src="{{ asset("assests/img/404.jpg") }}"
       
          alt=""
          width="72"
          height="57"
        />
<h1 class="display-1 fw-bold text-danger">404</h1>
<h2 class="fs-2">Page not found</h2>
<x-button href="/" class="btn-dark btn-sm">

    Back t0 home 

</x-button>


</div>

@endsection