@extends('layouts.app')
@section('content')

<div id="showR" class="container">
    <div class="row justify-content-md-between justify-content-sm-center">
        <div class="col-lg-7 col-md-7 col-sm-12 left">
            <div 
            class="card col-12" 
            >
                <div>
                    <img src="{{ Storage::exists($restaurant->image_path) ? asset('storage/' . $restaurant->image_path) : $restaurant->image_path }}" width='200px' class="d-block m-auto my-2">
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 right">
            <h3>
                {{$restaurant -> activity_name}}
            </h3>
            <div>
                <i class="fa-solid fa-map-location-dot"></i>
                <strong>Indirizzo: </strong>
                {{$restaurant -> address}}
            </div>
            <div>
                <i class="fa-solid fa-mobile-screen-button"></i>
                <strong>Tel: </strong>
                {{$restaurant -> mobile_phone}}
            </div>
            <div>
                <i class="fa-solid fa-id-card"></i>
                <strong>P.Iva: </strong>
                {{$restaurant -> vat}}
            </div>
            <div>
                <i class="fa-solid fa-utensils"></i>
                <strong>
                    <a href="{{ route('show', $restaurant -> id)}}" class="text-black">
                        Menù
                    </a>
                </strong>
            </div>
            <div>
                <i class="fa-solid fa-pen-to-square"></i>
                <strong>
                    <a class="text-black" href="{{ route('restaurants.editRestaurant', $restaurant -> id)}}">
                        Modifica Il Tuo Ristorante
                    </a>
                </strong>
            </div>
        </div>
    </div>
</div>

@endsection
