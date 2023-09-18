@extends('layouts.app')
@section('content')



<div id="showD" class="container">

    <h2 class="mb-3 text-center">Menù</h2>

    <div class="row justify-content-center">

        @foreach ($dishes as $dish)
            @if ($dish->restaurant_id == $restaurant->id)

                <div class="col-5 my-2">
                    <div class="card p-3">
                        <h4><strong>{{ $dish->name }}</strong></h4>

                        <img src="{{ Storage::exists($dish->image_path) ? asset('storage/' . $dish->image_path) : $dish->image_path }}" width="150px" class="my-2">

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
                        <div class="buttons">
                            <a href="{{route('dish.edit', $dish -> id) }}" class="button btn">
                                <i class="fa-solid fa-pen-to-square"></i> Modifica
                            </a>
                            <form action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button btn">
                                    <i class="fa-solid fa-trash-can"></i>Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <a class="text-decoration-none" href="{{ route('dish.create')}}">
            <button class="btn btn-success m-4">
                Aggiungi Un Nuovo Piatto
            </button>
        </a>
    </div>
</div>
@endsection
