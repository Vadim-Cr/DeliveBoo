@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inserisci un nuovo piatto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dish.store') }}"  enctype="multipart/form-data">
                        @csrf
                        @method("POST")

                        {{-- input nome piatto --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome del Piatto') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <input id="description" type="textarea" class="form-control" name="description" value="{{ old('description') }}" autofocus>
                            </div>
                        </div>

                        {{-- input prezzo piatto --}}
                        <div class="mb-4 row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}</label>

                            <div class="col-md-6">
                                <!-- Il tuo codice HTML e Blade qui sopra -->
                                <input id="price" type="text" class="form-control" name="price" value="{{old('price')}}" required autofocus>

                                <!-- Inserisci il tuo script JavaScript qui sotto -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const priceInput = document.getElementById("price");

                                        priceInput.addEventListener("blur", function() {
                                            const value = parseFloat(this.value.replace(",", "."));
                                            
                                            if (!isNaN(value)) {
                                                this.value = value.toLocaleString("it-IT", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                                            } else {
                                                alert('Attenzione, il dato inserito non è un numero!')
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                        {{-- checkbox per disponibilità --}}
                        <label for="availability">Disponibile</label>
                        <input type="checkbox" id="availability" name="availability" value="1">

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-success">
                                    {{ __('Inserisci') }}
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
