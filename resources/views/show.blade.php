@extends('layouts.app')
@section('content')



<div class="container d-flex justify-content-center my-3">
        <div class="row">
            <div class="card p-3">

            <h1 class='text-center bg-dark text-light p-2 rounded'>
                {{$restaurant -> activity_name}}
            </h1>
            <div>
                <img src="{{asset('storage/' . $restaurant->image_path)}}" width='200px' alt="">
            </div>
            
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
                        <a href="{{route('dish.edit', $dish -> id) }}" class="text-decoration-none">
                            <button class="btn btn-danger w-25 m-auto">Modifica</button>
                        </a>

                        <img src="{{ $dish->image_path }}" width="200px" alt="">

                        <h6>Descrizione:</h6>
                        <p>
                            {{ $dish->description }}
                        </p>

                        <h6>Prezzo:</h6>
                        <p>
                            {{ $dish->price }}
                        </p>

                        <h6>Disponibile:</h6>
                        <p>
                            {{ $dish->availability }}
                        </p>
                    </div>

                </div>

            @endif
        @endforeach
        <a class="text-decoration-none" href="{{ route('dish.create')}}">
            <button class="btn btn-success">
                AGGIUNGI UN NUOVO PIATTO
            </button>
        </a>

    </div>

</div>

@endsection
