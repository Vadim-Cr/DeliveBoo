@extends('layouts.app')
@section('content') 

<div id="EditR" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Aggiorna i tuoi dati') }}</div>

                <div class="card-body">
                <form
                    method="POST"
                    action="{{ route('update', $restaurant->id) }}"
                    enctype="multipart/form-data"
                    class="form-group"
                >
                    @csrf
                    @method("PUT")
            
                    {{-- input nome ristorante --}}
                    <div class="form-group mb-4 row">
                        <label for="activity_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività') }}</label>
                        <div class="col">
                            <input id="activity_name" type="text" class="form-control" name="activity_name" value="{{ $restaurant->activity_name }}" required autofocus>
                        </div>
                    </div>
            
                    {{-- input immagine --}}
                    <div class="form-group mb-4 row">
                        <label for="image_path" class="col-md-4 col-form-label text-md-right">Immagine</label>
                        <div class="col">
                        <input type="file" name="image_path" id="image_path" value="{{ $restaurant->image_path }}" class="form-control" accept="image/*" max="2097152">
                        </div>
                    </div>
            
                    {{-- input indirizzo ristorante --}}
                    <div class="form-group mb-4 row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>
                        <div class="col">
                            <input id="address" type="text" class="form-control" name="address" value="{{ $restaurant->address }}" required autofocus>
                        </div>
                    </div>
            
                    {{-- input p.iva ristorante --}}
                    <div class="form-group mb-4 row">
                        <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>
                        <div class="col">
                            <input id="vat" type="text" class="form-control" name="vat" value="{{ $restaurant->vat }}"" required autofocus minlength='13' maxlength='13'>
                        </div>
                    </div>
            
                    {{-- input numero cellulare --}}
                    <div class="form-group mb-4 row">
                        <label for="mobile_phone" class="col-md-4 col-form-label text-md-right">{{ __('Cellulare') }}</label>
                        <div class="col">
                            <input id="mobile_phone" type="text" class="form-control" name="mobile_phone" value="{{ $restaurant->mobile_phone}}" required autofocus minlength='13' maxlength='14'>
                        </div>
                    </div>
            
                    {{-- checkbox associazione ristorante --}}
                    <div class="mb-4 row">
                        <label for="typologies" class="col-md-4 col-form-label text-md-right">{{ __('Scegli il tipo di cucina:') }}</label>

                        <div class="col-md-6">
                            @foreach ($typologies as $typology)
                                <div>
                                    <input 
                                    type="checkbox" 
                                    name="typologies[]" 
                                    value="{{ $typology->id }}"
                                    id="typology-{{ $typology->id }}"
                                    @foreach ($restaurant->typologies as $restaurantTypology)
                                        @checked($typology->id === $restaurantTypology->id)
                                    @endforeach
                                    >
                                    {{ $typology -> name }}
                                </div>
                            @endforeach
                            <span id="checkError" class="text-danger"></span>
                            <input type="radio" id="checkIndicator" name="checkIndicator" class="d-none" required>
                        </div>
                    </div>
            
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary my-3 m-auto">
                            Aggiorna
                        </button>
                    </div>

                    {{-- client side validation --}}
                    <script>
                        const btnSubmit = document.getElementById('submit');
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        const checkIndicator = document.getElementById('checkIndicator');
                        const checkboxError = document.getElementById('checkError');

                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', function () {
                                const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                                checkIndicator.checked = anyChecked;
                            })
                        });

                        btnSubmit.addEventListener('click', function () {
                            if (!checkIndicator.checked) {
                                checkboxError.textContent = "Associa almeno una tipologia di cucina";
                            }
                        });
                    </script> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection