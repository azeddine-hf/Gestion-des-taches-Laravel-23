@extends('master')
@section('title','Mot de passe oublié?')
@section('content')
<main class="main-content">

    <div class="signUP-admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5 p-0">
                    <div class="signUP-admin-left position-relative h-100vh">
                        <div class="signUP-overlay">
                            <img class="svg signupTop" src="/import/img/svg/signuptop.svg" alt="svg" />
                            <img class="svg signupBottom" src="/import/img/svg/signupbottom.svg" alt="svg" />
                        </div>
                        <div class="signUP-admin-left__content">
                            <h2 class="font-weight-bold">Application gestion Des Taches </h1>
                        </div>
                        <div class="signUP-admin-left__img">
                            <img class="img-fluid svg" src="/import/img/svg/signupIllustration.svg" alt="svg" />
                        </div>
                    </div><!-- End: .signUP-admin-left -->
                </div><!-- End: .col -->
                <div class="col-xl-7 col-md-7 col-sm-8">
                    <div class="signUp-admin-right content-center h-100 pb-30">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-sm-10">
                                <div class="edit-profile mt-0">
                                    <div class="card border-0">
                                        <div class="text-center">
                                            <img src="/import/img/logo-blue.png" alt="Logo tech digital" height="150" width="150">
                                        </div>
                                        <div class="card-header border-0 pt-0 pb-0">
                                            <div class="signUp-header-top mt-md-0 mt-30">
                                                <h6 class="text-capitalize">{{__('Mot de passe oublié?')}}</h6>
                                                <p class="mt-3">Entrez l\'adresse e-mail que vous avez utilisée lors de votre inscription et nous vous enverrons des instructions pour réinitialiser votre mot de passe.
                                                    <br>ou <b class="text-danger text-break">contactez l\'administrateur</b></p>
                                            </div>
                                        </div>
                                        <div class="card-body pt-20 pb-0">
                                            <div class="edit-profile__body">
                                                @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                                @endif
                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <div class="form-group mb-20">
                                                        <label for="email">{{__('Email adresse')}}</label>
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required
                                                            autocomplete="email" autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="d-flex mb-sm-35 mb-20">
                                                        <button type="submit"
                                                            class="btn w-100 btn-primary btn-default btn-squared lh-normal px-md-50 py-15 signIn-createBtn">
                                                            Envoyer le lien de réinitialisation du mot de passe
                                                        </button>
                                                    </div>
                                                    <p class="mb-0 fs-14 fw-500 text-gray">
                                                        {{('Retourner à')}}
                                                        <a href="{{route('login')}}" class="color-primary">
                                                            {{('S\'identifier')}}
                                                        </a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- End: .card -->
                                </div><!-- End: .edit-profile -->
                            </div><!-- End: col -->
                        </div>
                    </div><!-- End: .signUp-admin-right -->
                </div><!-- End: .col -->
            </div>
        </div>
    </div><!-- End: .signUP-admin -->

</main>

@endsection
