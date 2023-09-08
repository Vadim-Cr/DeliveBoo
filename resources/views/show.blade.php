@extends('layouts.app')
@section('content')



<div class="container d-flex justify-content-center my-3">
        <div class="row">
            <div class="card">

            <h1 class='text-center bg-dark text-light'>
                {{$restaurant -> activity_name}}
                <a class="text-decoration-none btn btn-light" href="{{ route('restaurants.editRestaurant', $restaurant -> id)}}">
                    Modifica
                </a>
            </h1>

            <div>
                <span><strong>Indirizzo:</strong> {{$restaurant -> address}}</span>
            </div>

            <div>
                <span><strong>Tel:</strong> {{$restaurant -> mobile_phone}}</span>
            </div>

        </div>

    </div>

</div>

<div class="container-fluid text-center">

    <h2>LISTA PIATTI</h2>

    <div class="row justify-content-center">

        @foreach ($dishes as $dish)
            @if ($dish->restaurant_id == $restaurant->id)

                <div class="col-4 my-2">

                    <div class="card">
                        <h4><strong>{{ $dish->name }}</strong></h4>

                        <h6>Descrizione:</h6>
                        <p>
                            {{ $dish->description }}
                        </p>
                    </div>

                </div>

            @endif
        @endforeach


    </div>

</div>

@endsection
