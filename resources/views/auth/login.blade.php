@extends('master')
@section('title','Connexion')
@section('content')
<main class="main-content">
    <div class="signUP-admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5 p-0">
                    <div class="signUP-admin-left signIn-admin-left position-relative">
                            <h2 class="font-weight-bold">Application gestion Des Taches </h1>
                        <div class="signUP-overlay">
                            <img class="svg signupTop" src="/import/img/svg/signuptop.svg" alt="img" />
                            <img class="svg signupBottom" src="/import/img/svg/signupbottom.svg" alt="img" />
                        </div><!-- End: .signUP-overlay  -->
                        <div class="signUP-admin-left__img"><br><br>
                            <img class="img-fluid svg" src="/import/img/svg/signupIllustration.svg" alt="img" />
                        </div><!-- End: .signUP-admin-left__img  -->
                    </div><!-- End: .signUP-admin-left  -->
                </div><!-- End: .col-xl-4  -->
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-8">
                    <div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-9 col-md-12">
                                <div class="edit-profile mt-md-25 mt-0">
                                    <div class="card border-0">
                                        <div class="text-center">
                                            <img src="/import/img/logo-blue.png" alt="Logo tech digital" height="150" width="150">
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="edit-profile__body">
                                                    <div class="form-group mb-20">
                                                        <label for="email">Adress Email</label>
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                            id="email" placeholder="Adress Email" name="email"
                                                            value="{{ old('email') }}" required autocomplete="email"
                                                            autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password">Mot de passe</label>
                                                        <div class="position-relative">
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required
                                                                autocomplete="current-password">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="signUp-condition signIn-condition">
                                                        <div class="checkbox-theme-default custom-checkbox ">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="remember" name="remember" {{ old('remember')
                                                                ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Souviens-toi de moi') }}
                                                            </label>
                                                        </div>
                                                        @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Mot de passe oublié?') }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                    <div class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button type="submit" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn">
                                                            {{ __('Connexion') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div><!-- End: .card-body -->
                                    </div><!-- End: .card -->
                                </div><!-- End: .edit-profile -->
                            </div><!-- End: .col-xl-5 -->
                        </div>
                    </div><!-- End: .signUp-admin-right  -->
                </div><!-- End: .col-xl-8  -->
            </div>
        </div>
    </div><!-- End: .signUP-admin  -->

</main>

@endsection
