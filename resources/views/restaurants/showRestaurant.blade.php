@extends('layouts.app')
@section('content')

<h1 class='text-center bg-dark text-light py-2'>
    DeliveBoo
</h1>

<div class="container d-flex justify-content-center">
    <div class="row">
        <a 
        class="text-decoration-none card m-2 col-12" 
        href="{{ route('show', $restaurant -> id)}}"
        >
            <div>
                <h3 class="text-center">
                    {{$restaurant -> activity_name}}
                </h3>

                <img src="{{ Storage::exists($restaurant->image_path) ? asset('storage/' . $restaurant->image_path) : $restaurant->image_path }}" width='200px' class="d-block m-auto my-2">

                <div>
                    <strong>Indirizzo:</strong> {{$restaurant -> address}}
                </div>
                <div>
                    <strong>Tel:</strong> {{$restaurant -> mobile_phone}}
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
