@extends('../master',['body_class' => 'layout-light side-menu overlayScroll'])
@section('title','404 Error')
@section('active','active')
    @section('content')
<main class="main-content">
    <div class="contents expanded">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Start: error page -->
                    <div class=" content-center">
                        <div class=" text-center">
                            <img src="{{asset('import/img/404.png')}}" width="400" height="400" alt="404" class="svg">
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
