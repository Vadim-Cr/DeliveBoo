@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inserisci un nuovo piatto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dish.update', $dish -> id) }}" >
                        @csrf
                        @method("PUT")
                    
                        {{-- input nome piatto --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome del Piatto') }}</label>
                    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$dish -> name}}"  required autocomplete="name" autofocus>
                            </div>
                        </div>
                    
                        {{-- input immagine --}}
                        <div class="mb-4 row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">Immagine</label>
                            
                            <div class="col-md-6">
                                <input  type="file" class="form-control" name='image_path' id="image_path" accept="image/*" max="2097152">
                            </div>
                        </div>
                        
                        {{-- input descrizione --}}
                        <div class="mb-4 row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione Piatto') }}</label>
                    
                            <div class="col-md-6">
                                <input id="description" type="textarea" class="form-control" name="description" value="{{$dish -> description}}" autofocus>
                            </div>
                        </div>
                    
                        {{-- input prezzo piatto --}}
                        <div class="mb-4 row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}</label>
                    
                            <div class="col-md-6">
                                <input id="price" type="text" placeholder="00.00" pattern="\d+\.\d{2}" title="(esempio: 10.00)" class="form-control" name="price"  value="{{$dish -> price}}" required autofocus>
                            </div>
                        </div>
                    
                        {{-- checkbox per disponibilità --}}
                        <label for="availability">Disponibile</label>
                        <input type="checkbox" id="availability" name="availability"  value="{{$dish -> availability}}">
                    
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-success">
                                    {{ __('aggiorna') }}
                                </button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
