@extends('master',['body_class' => 'layout-light side-menu overlayScroll'])
@section('title','Accueil')
@section('active','active')
    @section('content')
<main class="main-content">
    <div class="contents expanded">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Start: error page -->
                    <div class="min-vh-100 content-center">
                        <div class=" text-center">
                            <img src="{{asset('import/img/403.png')}}" width="400" height="400" alt="404" class="svg">
                            <h5 class="fw-500">Désolé! la page que vous recherchez n'existe pas.</h5>
                            <div class="content-center mt-30">
                                <a href="{{'/'}}" class="btn btn-primary btn-default btn-squared px-30">Retour à l'Accueil</a>
                            </div>
                        </div>
                    </div>
                    <!-- End: error page -->
                </div>
            </div>
        </div>

    </div>
    <footer class="footer-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-copyright">
                        <p>2020 @<a href="#">Aazztech</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-menu text-right">
                        <ul>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- ends: .Footer Menu -->
                </div>
            </div>
        </div>
    </footer>
</main>
<div id="overlayer">
    <span class="loader-overlay">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </span>
</div>
<div class="overlay-dark-sidebar show"></div>
@endsection
