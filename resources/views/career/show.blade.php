@extends('layouts.app')
<style>
    .card-custom {
        max-width: 250px;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="card mx-2 mb-3">
            <img src="{{!! url('https://cloud-cube.s3.amazonaws.com/ranbla920cxv/public/'.$career->picture_path) !!}" alt="{{ $career->name }}" class="card-img-top" width="400"
                height="350">
            <div class="card-body">

                <h4 class="card-title font-weight-bold">{{ $career->name }}</h4>

                <p class="card-text">{{ $career->description }}</p>
                <a href="{{ route('course.create',$career) }}" class="btn btn-primary">Registrar nuevo curso</a>
                <hr>
                <div class="row justify-content-center ">
                    <h4 class="font-weight-bold">Modulos:</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($courses as $course)
                    <a class="list-group-item list-group-item-action" href="javascript:void(0);" data-toggle="modal"
                        data-target="#module-{{ $course->id }}Modal">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img src="{!! url('https://cloud-cube.s3.amazonaws.com/ranbla920cxv/public/'.$course->picture_path) !!}" class="rounded-circle" width="75"
                                    height="75" alt="">
                            </div>
                            <div class="col-md-10">
                                <h6 class="font-weight-bold">{{ $course->name }}</h6>
                                <div class="row">
                                    <div class="col">{{ $course->qualification }}</div>
                                    <div class="col">Total de horas: {{ $course->hours_quantity }}</div>
                                    <div class="col ">Turnos:
                                        @foreach ($course->modules as $module)
                                        {{ $module->shift }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="" class="btn btn-primary">Matricularme</a>
            </div>
        </div>
    </div>
</div>
@foreach ($courses as $course)
<div class="modal fade" id="module-{{ $course->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="module-{{ $course->id }}ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="module-{{ $course->id }}ModalLabel">{{ $course->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    @foreach ($course->modules as $module)
                    <form action="{{ route('group.store',$module) }}" method="POST">
                        @csrf
                        <div class="card card-custom mx-2 mb-3">
                            <div class="card-header">
                                <div class="row justify-content-around">
                                    <div><b>Turno: </b>{{ $module->shift }}</div>
                                    <span class="badge badge-success">{{ $module->state }}</span>
                                </div>

                            </div>
                            <div class="card-body text-center">
                                Periodo académico: {{ $module->academic_period }}
                                <br>
                                Fecha Inicio: {{ $module->start_date }}
                                <br>
                                Fecha Termino: {{ $module->end_date }}
                                <br>
                                Docente: {{ $module->teacher->user->name }}
                                <br>
                                Total de horas: {{ $course->hours_quantity }}
                                <br>
                                Días: {{ $module->days }}
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Matricularme">
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
