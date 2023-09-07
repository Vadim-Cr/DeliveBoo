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
            <div class="card m-2 col-3">
                <h3>
                    {{$restaurant -> activity_name}}
                </h3>
                <p>
                    {{$restaurant -> address}}
                </p>
                <p>
                    {{$restaurant -> mobile_phone}}
                </p>

            </div>
        @endforeach
    </div>
</div>

@endsection
