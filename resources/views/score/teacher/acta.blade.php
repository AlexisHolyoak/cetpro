@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4><b>Curso: </b>{{ $course->name }}</h4>
            <div class="row justify-content-around">
                <div class="col">
                    Fecha de inicio: {{ $module->start_date }}
                </div>
                <div class="col">
                    Fecha de termino: {{ $module->end_date }}
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col">
                    Docente: {{ $teacher->user->name }}
                </div>
                <div class="col">
                    Turno: {{ $module->shift }}
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col">
                            Criterios
                        </div>
                        <div class="col">
                            <a href="{{ route('evaluation.create',$module) }}" class="badge badge-success">Nuevo</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Seleccione
                    <ul class="list-group list-group-flush">
                        @foreach ($evaluations as $evaluation)
                        <li class="list-group-item"><b>C{{ $evaluation->id }}</b> {{ $evaluation->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Notas
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="1%">Acciones</th>
                                    <th>Alumno</th>
                                    @foreach ($evaluations as $evaluation)
                                    <th width="1%">C{{ $evaluation->id }}</th>
                                    @endforeach
                                    <th width="1%">Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <a href="{{ route('score.show',['student'=>$student,'module'=>$module]) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver </a>

                                    </td>
                                    <td>{{ $student->user->name }}</td>
                                    @foreach ($evaluations as $evaluation)
                                    <!--this is a disaster, but is a pro staff-->
                                    <td>
                                        @if($scores->where('evaluation_id',$evaluation->id)->where('student_id',$student->id)->first())
                                        {{
                                        $scores->where('evaluation_id',$evaluation->id)->where('student_id',$student->id)->first()->score
                                        }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    @endforeach

                                    <td>Prom</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="text" class="btn btn-primary btn-sm" value="Cerrar acta">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Detalle de notas
                </div>
                <div class="card-body">
                    <div class="card-text">
                        Porfavor haz click en el boton "VER" del alumno para actualizar o visualizar sus notas
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
