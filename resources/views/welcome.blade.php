@extends('layouts.app')
@section('content')



<div class="container">
    <h1 class='text-center bg-dark text-light'>
        DeliveBoo
    </h1>
</div>

<div class="container d-flex ">
    <div class="row justify-content-center">
        @foreach ($restaurants as $restaurant)
            <a class="text-decoration-none card m-2 col-3" href="{{ route('show', $restaurant -> id)}}">
                <div>
                    <h3>
                        {{$restaurant -> activity_name}}
                    </h3>
                    <div>
                        <span><strong>Indirizzo:</strong> {{$restaurant -> address}}</span>
                    </div>
                    <div>
                        <span><strong>Tel:</strong> {{$restaurant -> mobile_phone}}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
