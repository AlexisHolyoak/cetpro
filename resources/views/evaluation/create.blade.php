@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Criterios de evaluación
                    <a href="javascript:void(0)" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#evaluationModal">Nuevo
                        criterio</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Curso:</b>
                                </td>
                                <td>
                                    {{ $module->course->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Fecha de inicio: </b>
                                </td>
                                <td>
                                    {{ $module->start_date }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Fecha de culminación: </b>
                                </td>
                                <td>
                                    {{ $module->end_date }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Profesor: </b>
                                </td>
                                <td>
                                    {{ $module->teacher->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Periodo académico: </b>
                                </td>
                                <td>
                                    {{ $module->academic_period }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Días: </b>
                                </td>
                                <td>
                                    {{ $module->days }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                    Codigo
                                </th>
                                <th>
                                    Criterio
                                </th>
                                <th style="width:1%">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($module->evaluations as $evaluation)
                            <tr>
                                <td>
                                    {{ $evaluation->id }}
                                </td>
                                <td>
                                    {{ $evaluation->name }}
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#evaluationModal-edit{{ $evaluation->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="evaluationModal" tabindex="-1" role="dialog" aria-labelledby="evaluationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('evaluation.store',$module) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="evaluationModalLabel">Nuevo Criterio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Registrar nuevo criterio de evaluación para este modulo, todos los alumnos de este modulo seran
                    evaluados y calificados dependiendo de los criterios creados
                    <hr>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Criterio de evaluación:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Escriba el nuevo criterio...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($module->evaluations as $evaluation)
    @include('evaluation.edit')
@endforeach
@endsection
