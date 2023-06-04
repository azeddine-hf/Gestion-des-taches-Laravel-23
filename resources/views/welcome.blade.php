@extends('master',['body_class' => 'layout-light side-menu overlayScroll'])
@section('title','Accueil')
@section('active','active')
    @section('content')
    @php
        $isjustone = false;
    @endphp
<br>
    <main class="main-content">
        <div class="contents expanded">
            <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-4 mb-25">
                            <div class="social-overview-wrap">

                                <div class="card border-0">
                                    <div class="card-header">
                                        <h6 class="text-capitalize">tâches d'aujourd'hui</h6>
                                    </div>
                                    <div class="card-body">
                                        @if($tasksCount === 0)
                                            <span style="font-size: 14px" class="badge badge-light rounded-pill pl-2 pr-2 text-white">Les tâches d'aujourd'hui n'ont pas été ajoutées</span>
                                        @elseif($tasksCount === 1)
                                            <p>Vous avez <b class="text-white badge badge-warning">une</b> tâche aujourd'hui.</p>
                                        @else
                                            <p style="font-size: 18px" class="badge badge-light rounded-pill pl-2 pr-2 text-white">Vous avez <b style="font-size: 18px" class="text-white badge badge-danger">{{ $tasksCount }}</b> tâches aujourd'hui!</p>
                                        @endif
                                        <p class="mt-4"><a href="{{url('mes-taches')}}" class="dropdown-wrapper__more">Voir toutes les tâches </a></p>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <time datetime="{{ \Carbon\Carbon::now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}" class="icon text-capitalize">
                                    <em class="text-capitalize">{{ $today }}</em>
                                    <strong class="text-capitalize">{{ \Carbon\Carbon::now()->locale('fr')->isoFormat('MMMM') }}</strong>
                                    <span>{{ \Carbon\Carbon::now()->locale('fr')->isoFormat('D') }}</span>
                                </time>
                            </div>
                        </div>

                        <button type="reset" class="d-none"></button>
                        <div class="col-lg-8 mb-25">
                            <div class="card card-overview border-0">
                                <div class="card-header">
                                    <h6>Tâches de la semaine</h6>
                                    <div><a href="{{ route('tasks.export') }}" class="btn btn-success"><span data-feather="download"></span>Exporter mes tâches</a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-0">
                                    <div class="tab-content mb-3">
                                    <div class="atbd-nav-controller nav-controller-slide">
                                        <div class="nav-controller-content tab-content">
                                            <div class="tab-pane fade show active"  id="control2" role="tabpanel" aria-labelledby="control2-tab">
                                                <div class="tab-slide-content" >
                                                    <div class="atbd-tab tab-vertical">
                                                        <ul class="nav nav-tabs vertical-tabs " role="tablist" style="min-width:100px">
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='lundi' ? 'active' : '')}}" id="tab-vertical-1-tab" data-toggle="tab" href="#tab-vertical-1" role="tab" aria-controls="tab-vertical-1" aria-selected="{{($today ==='lundi' ? 'true' : 'false')}}">Lundi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='mardi' ? 'active' : '')}}" id="tab-vertical-2-tab" data-toggle="tab" href="#tab-vertical-2" role="tab" aria-controls="tab-vertical-2" aria-selected="{{($today ==='mardi' ? 'true' : 'false')}}">Mardi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='mercredi' ? 'active' : '')}}" id="tab-vertical-3-tab" data-toggle="tab" href="#tab-vertical-3" role="tab" aria-controls="tab-vertical-3" aria-selected="{{($today ==='mercredi' ? 'true' : 'false')}}">Mercredi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='jeudi' ? 'active' : '')}}" id="tab-vertical-4-tab" data-toggle="tab" href="#tab-vertical-4" role="tab" aria-controls="tab-vertical-4" aria-selected="{{($today ==='jeudi' ? 'true' : 'false')}}">Jeudi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='vendredi' ? 'active' : '')}}" id="tab-vertical-5-tab" data-toggle="tab" href="#tab-vertical-5" role="tab" aria-controls="tab-vertical-5" aria-selected="{{($today ==='vendredi' ? 'true' : 'false')}}">Vendredi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{($today ==='samedi' ? 'active' : '')}}" id="tab-vertical-6-tab" data-toggle="tab" href="#tab-vertical-6" role="tab" aria-controls="tab-vertical-6" aria-selected="{{($today ==='samedi' ? 'true' : 'false')}}">Samedi</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">

                                                            <div class="tab-pane fade {{($today ==='lundi' ? ' show active' : '')}}" id="tab-vertical-1" role="tabpanel" aria-labelledby="tab-vertical-1-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>
                                                                        @foreach($tasksThisWeek as $task)
                                                                        @if($tasksThisWeek->filter(function($task) {
                                                                            return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'lundi';
                                                                        })->isNotEmpty())
                                                                            @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'lundi')
                                                                                <div class="col-12">
                                                                                    <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                            @if($task->status === 'en cours')
                                                                                                <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                            @else
                                                                                                <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                            @endif


                                                                                            @if($task->property === 'urgent')
                                                                                                <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                            @else
                                                                                                <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                            @endif

                                                                                    </li>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Lundi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach

                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <div class="tab-pane fade {{($today ==='mardi' ? 'show active' : '')}}" id="tab-vertical-2" role="tabpanel" aria-labelledby="tab-vertical-2-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>

                                                                        @foreach($tasksThisWeek as $task)
                                                                        @if($tasksThisWeek->filter(function($task) {
                                                                                        return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'mardi';
                                                                                    })->isNotEmpty())
                                                                                @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'mardi')
                                                                                    <div class="col-12">
                                                                                        <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                                @if($task->status === 'en cours')
                                                                                                    <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                                @endif


                                                                                                @if($task->property === 'urgent')
                                                                                                    <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                                @endif

                                                                                        </li>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Mardi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <div class="tab-pane fade {{($today ==='mercredi' ? ' show active' : '')}}" id="tab-vertical-3" role="tabpanel" aria-labelledby="tab-vertical-3-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>
                                                                        @php
                                                                            $isjustone=false;
                                                                        @endphp
                                                                        @foreach($tasksThisWeek as $task)
                                                                            @if($tasksThisWeek->filter(function($task) {
                                                                                    return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'mercredi';
                                                                                })->isNotEmpty())
                                                                                @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'mercredi')
                                                                                    <div class="col-12">
                                                                                        <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                                @if($task->status === 'en cours')
                                                                                                    <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                                @endif


                                                                                                @if($task->property === 'urgent')
                                                                                                    <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                                @endif

                                                                                        </li>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Mercredi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <div class="tab-pane fade {{($today ==='jeudi' ? ' show active' : '')}}" id="tab-vertical-4" role="tabpanel" aria-labelledby="tab-vertical-4-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>
                                                                        @php
                                                                            $isjustone=false;
                                                                        @endphp
                                                                        @foreach($tasksThisWeek as $task)
                                                                            @if($tasksThisWeek->filter(function($task) {
                                                                                return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'jeudi';
                                                                            })->isNotEmpty())
                                                                                @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'jeudi')
                                                                                    <div class="col-12">
                                                                                        <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                                @if($task->status === 'en cours')
                                                                                                    <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                                @endif


                                                                                                @if($task->property === 'urgent')
                                                                                                    <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                                @endif

                                                                                        </li>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Jeudi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <div class="tab-pane fade {{($today ==='vendredi' ? ' show active' : '')}}" id="tab-vertical-5" role="tabpanel" aria-labelledby="tab-vertical-5-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>
                                                                        @php
                                                                            $isjustone=false;
                                                                        @endphp
                                                                        @foreach($tasksThisWeek as $task)
                                                                            @if($tasksThisWeek->filter(function($task) {
                                                                                    return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'vendredi';
                                                                                })->isNotEmpty())
                                                                                @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'vendredi')
                                                                                    <div class="col-12">
                                                                                        <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                                @if($task->status === 'en cours')
                                                                                                    <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                                @endif

                                                                                                @if($task->property === 'urgent')
                                                                                                    <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                                @endif

                                                                                        </li>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Vendredi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <div class="tab-pane fade {{($today ==='samedi' ? ' show active' : '')}}" id="tab-vertical-6" role="tabpanel" aria-labelledby="tab-vertical-6-tab">
                                                                @if($tasksThisWeek->isEmpty())
                                                                    <span class="atbd-tag tag-transparented tag-light">Aucune tâche</span>
                                                                @else
                                                                    <ul>
                                                                        @php
                                                                            $isjustone=false;
                                                                        @endphp
                                                                        @foreach($tasksThisWeek as $task)
                                                                            @if($tasksThisWeek->filter(function($task) {
                                                                                    return \Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'samedi';
                                                                                })->isNotEmpty())
                                                                                @if(\Carbon\Carbon::parse($task->created_at)->locale('fr')->isoFormat('dddd') === 'samedi')
                                                                                    <div class="col-12">
                                                                                        <li><span class="float-left">{{ substr($task->desc_task, 0, 45) }}...</span>

                                                                                                @if($task->status === 'en cours')
                                                                                                    <span class="atbd-tag tag-transparented tag-warning">{{ $task->status }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success">{{ $task->status }}</span>
                                                                                                @endif


                                                                                                @if($task->property === 'urgent')
                                                                                                    <span class="atbd-tag tag-transparented tag-danger float-right">{{ $task->property }}</span>
                                                                                                @else
                                                                                                    <span class="atbd-tag tag-transparented tag-success float-right">{{ $task->property }}</span>
                                                                                                @endif

                                                                                        </li>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                @if (!$isjustone)
                                                                                        <li>Aucune tâche ajoutée pour Samedi</li>
                                                                                    @php
                                                                                        $isjustone=true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>



                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="mt-8 mb-4"><a href="{{url('mes-taches')}}" class="dropdown-wrapper__more">Voir toutes les tâches </a></div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-4 mb-25">

                            <div class="card border-0">
                                <div class="card-header">
                                    <h6>Status de mes Tȃches</h6>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        @php
                                            $tasksInProgressCount = $taskAll->where('status', 'en cours')->count();
                                            $tasksCompletedCount = $taskAll->where('status', 'terminé')->count();
                                        @endphp
                                        <div class="col-xl-12">
                                            <div class="" style="border-radius: 20px;">
                                                <div class="">
                                                    <div class="float-right">
                                                        <span data-feather="check-square" class="text-success" width="40" height="40"></span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-1 mt-1 text-success"><span id="task_done">{{$tasksCompletedCount}}</span></h4>
                                                        <span class="badge badge-success pl-2 pr-2 rounded-pill" style="font-size: 15px;">Tȃches Terminé</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-4">
                                        <div class="col-xl-12">
                                            <div class="" style="border-radius: 20px;">
                                                <div class="">
                                                    <div class="float-right">
                                                        <span data-feather="clock" class="text-warning" width="40" height="40"></span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-1 mt-1 text-warning"><span id="task_done">{{$tasksInProgressCount}}</span></h4>
                                                        <span class="badge badge-warning text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Tȃches En Cours</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-8 col-md-8 mailbox-lis">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Messages de l'administrateur</h6>
                                </div>
                                <div class="card-body">
                                @if ($contacts->isEmpty())
                                    <span class="badge badge-transparent badge-round">Vous n'avez pas de Nouveau message de l'administrateur</span>
                                @else
                                    @foreach($contacts as $contact)
                                        <div class="mailbox-list__single d-flex justify-content-between">
                                            <div class="mail-authorBox d-flex flex-grow-0">
                                                <span class="auhor-info">
                                                    <a href="{{url('chat/'. $contact['id'])}}"
                                                    class="profile-image rounded-circle d-block m-0 wh-70"
                                                    style="background-image:url('{{ asset('/import/profileImg/'.$contact['profile']) }}'); background-size: cover;"></a>
                                                </span>
                                            </div>
                                            <div class="mail-content flex-grow-1 ml-3">
                                                <div class="mail-content__top">
                                                    <h6 class="mail-title">
                                                        <a href="{{url('chat/'. $contact['id'])}}" class="text-capitalize">{{ $contact['name'] }} {{ $contact['lname'] }}</a>
                                                        <span class="badge badge-transparent badge-round">Nouveau message!</span>
                                                    </h6>
                                                    <p class="ml-2 fw-500">{{ $contact['msg'] }}</p>
                                                </div>
                                            </div>
                                            <span class="time-meta text-success">
                                                {{$contact['formattedDate']}}
                                            </span>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                                <!-- ends: .card-body -->
                            </div>
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

