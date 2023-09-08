@extends('layouts.app')
@section('content')



<div class="">
    <h1 class='text-center bg-dark text-light'>
        DeliveBoo
    </h1>
</div>

<div class="container d-flex justify-content-center">
    <div class="row ">
        <a class="text-decoration-none card m-2 col-12" href="{{ route('show', $restaurant -> id)}}">
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
    </div>
</div>

@endsection
