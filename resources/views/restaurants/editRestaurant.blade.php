@extends('layouts.app')
@section('content')



<div class="">
    <h1 class='text-center bg-dark text-light'>
        DeliveBoo
    </h1>
</div>


<div class="container text-center justify-content-center">
    <h1>{{ $restaurant -> activity_name}} Update restaurant</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <form
            method="POST"
            action="{{ route('update', $restaurant->id) }}"
            enctype="multipart/form-data"
            class="form-group">
                    @csrf
                    @method("PUT")
        
                <div class="form-group">
                    <label for="activity_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività') }}</label>
                    <div class="col">
                        <input id="activity_name" type="text" class="form-control" name="activity_name" value="{{ $restaurant->activity_name }}" required autofocus>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="image_path" class="col-md-4 col-form-label text-md-right">Immagine</label>
                    <div class="col">
                    <input type="file" name="image_path" id="image_path" value="{{ $restaurant->image_path }}" class="form-control" accept="image/*" max="2097152">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>
                    <div class="col">
                        <input id="address" type="text" class="form-control" name="address" value="{{ $restaurant->address }}" required autofocus>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>
                    <div class="col">
                        <input id="vat" type="text" class="form-control" name="vat" value="{{ $restaurant->vat }}"" required autofocus minlength='13' maxlength='13'>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="mobile_phone" class="col-md-4 col-form-label text-md-right">{{ __('Cellulare') }}</label>
                    <div class="col">
                        <input id="mobile_phone" type="text" class="form-control" name="mobile_phone" value="{{ $restaurant->mobile_phone}}" required autofocus minlength='13' maxlength='14'>
                    </div>
                </div>
        
                <div class="form-group">
                    @foreach ($typologies as $typology)
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value="{{ $typology->id }}"
                                name="typologies[]"
                                id="typology-{{ $typology->id }}"
                                @foreach ($restaurant->typologies as $restaurantTypology)
                                    @checked($typology->id === $restaurantTypology->id)
                                @endforeach
                            >
                            <label class="form-check-label" for="typology-{{ $typology->id }}">
                                {{ $typology->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
        
                <button type="submit" class="btn btn-primary my-3">Update</button>

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


@endsection
