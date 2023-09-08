@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" onsubmit="event.preventDefault(); validatePassword()" enctype="multipart/form-data">
                        @csrf
                        {{-- input nome ristoratore --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- input email ristoratore --}}
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- input password ristoratore --}}
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        {{-- input conferma password ristoratore --}}
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id="pwdError" class="text-danger"></span>
                            </div>

                            {{-- funzione validazione lato client --}}
                            <script>
                                const passwordInput = document.getElementById('password');
                                const confirmPasswordInput = document.getElementById('password-confirm');
                                const passwordError = document.getElementById('pwdError');
                            
                                confirmPasswordInput.addEventListener('input', function () {
                                    const password = passwordInput.value;
                                    const confirmPassword = confirmPasswordInput.value;
                            
                                    if (password === confirmPassword) {
                                        passwordError.textContent = ''; 
                                    } else {
                                        passwordError.textContent = 'Le password non corrispondono';
                                    }
                                });
                            </script>
                        </div>

                        {{-- input nome attività --}}
                        <div class="mb-4 row">
                            <label for="activity_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività') }}</label>

                            <div class="col-md-6">
                                <input id="activity_name" type="text" class="form-control" name="activity_name" value="{{ old('activity_name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">Image_path</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" id="image_path">
                            </div>
                        </div>

                        {{-- input indirizzo attività --}}
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
                            </div>
                        </div>

                        {{-- input partita iva --}}
                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="vat" value="{{ old('vat','IT') }}" required autofocus minlength='13' maxlength='13'>
                            </div>
                        </div>

                        {{-- input numero cellulare ristoratore --}}
                        <div class="mb-4 row">
                            <label for="mobile_phone" class="col-md-4 col-form-label text-md-right">{{ __('Cellulare') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_phone" type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone', '+39 ') }}" required autofocus minlength='13' maxlength='14'>
                            </div>
                        </div>

                        {{-- associazione tipologie di cucina --}}
                        <div class="mb-4 row">
                            <label for="typologies" class="col-md-4 col-form-label text-md-right">{{ __('Scegli il tipo di cucina:') }}</label>

                            <div class="col-md-6">
                                @foreach ($typologies as $typology)
                                    <div>
                                        <input type="checkbox" name="typologies[]" id="typologies" value="{{ $typology->id }}">
                                        {{ $typology -> name }}
                                    </div>
                                @endforeach
                                <input type="radio" id="checkIndicator" name="checkIndicator" required>
                                {{-- funzione controllo almeno una checkbox selezionata --}}
                                <script>
                                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                    const checkIndicator = document.getElementById('checkIndicator');

                                    checkboxes.forEach(checkbox => {
                                    checkbox.addEventListener('change', function () {
                                        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                                        checkIndicator.checked = anyChecked;
                                    });
                                </script> 
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
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
