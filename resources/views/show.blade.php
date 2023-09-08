@extends('layouts.app')
@section('content')



<div class="container d-flex justify-content-center my-3">
        <div class="row">
            <div class="card p-3">

            <h1 class='text-center bg-dark text-light p-2 rounded'>
                {{$restaurant -> activity_name}}
            </h1>
            
            <div class="m-2">
                <span><strong>Indirizzo:</strong> {{$restaurant -> address}}</span>
            </div>
            
            <div class="m-2">
                <span><strong>Tel:</strong> {{$restaurant -> mobile_phone}}</span>
            </div>
            <a class="text-decoration-none btn bg-warning" href="{{ route('restaurants.editRestaurant', $restaurant -> id)}}">
                Modifica il tuo Ristorante
            </a>

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
