@extends('layouts.app')
@section('content')



<div class="container d-flex justify-content-center my-3">
    <div class="row">
        <div class="card p-3">
            <h1 class='text-center bg-dark text-light p-2 rounded'>
                {{$restaurant -> activity_name}}
            </h1>
            
            <img src="{{ Storage::exists($restaurant->image_path) ? asset('storage/' . $restaurant->image_path) : $restaurant->image_path }}" width='200px' class="d-block m-auto my-2">
            
            <div class="m-2">
                <strong>Indirizzo:</strong> {{$restaurant -> address}}
            </div>
            
            <div class="m-2">
                <strong>Tel:</strong> {{$restaurant -> mobile_phone}}
            </div>
            <div class="m-2">
                <strong>P.IVA:</strong> {{$restaurant -> vat}}
            </div>
            <a class="text-decoration-none btn bg-warning" href="{{ route('restaurants.editRestaurant', $restaurant -> id)}}">
                Modifica il tuo Ristorante
            </a>
        </div>
    </div>
</div>

<div class="container-fluid text-center">

    <h2 class="text-center bg-dark text-light p-1 my-3 rounded w-25 m-auto">LISTA PIATTI</h2>

    <div class="row justify-content-center">

        @foreach ($dishes as $dish)
            @if ($dish->restaurant_id == $restaurant->id)

                <div class="col-4 my-2">
                    <div class="card">
                        <h4><strong>{{ $dish->name }}</strong></h4>
                        <a href="{{route('dish.edit', $dish -> id) }}" class="text-decoration-none btn btn-warning w-25 m-auto">
                            Modifica
                        </a>

                        <img src="{{ Storage::exists($dish->image_path) ? asset('storage/' . $dish->image_path) : $dish->image_path }}" width='200px' class="d-block m-auto my-2">

                        <span>
                            <strong>Descrizione:</strong>
                            {{ $dish->description }}
                        </span>
                        <span>
                            <strong>Prezzo:</strong>
                            &euro;{{ $dish->price }}
                        </span>
                        <span>
                            <strong>Disponibile:</strong>
                            {{ $dish->availability }}
                        </span>
                    </div>
                </div>
            @endif
        @endforeach
        <a class="text-decoration-none" href="{{ route('dish.create')}}">
            <button class="btn btn-success">
                Aggiungi Un Nuovo Piatto
            </button>
        </a>
    </div>
</div>

@endsection
