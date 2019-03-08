@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Notas</div>
                <div class="card-body">
                    los alumnos podrian llevar mas de dos carreras, click sobre ver detalle para visualizar la información del curso como el docente, periodo, etc y el detalle de los criterios y la puntuación que se tien registrada
                    <h4><a href="" class="badge badge-dark">Turismo y Hoteleria</a></h4>
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Nota</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td>Reposteria</td>
                                <td>20</td>
                                <td><a href="javascript:void(0);" class="badge badge-warning" data-toggle="modal" data-target="#coursedetail">Ver detalle</a></td>
                            </tr>
                            <tr class="table-row">
                                <td>Reposteria</td>
                                <td>20</td>
                                <td><a href="javascript:void(0);" class="badge badge-warning" data-toggle="modal" data-target="#coursedetail">Ver detalle</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4><a href="" class="badge badge-dark">Administración y comercio</a></h4>
                    <table class="table  table-hover">
                        <thead>
                        <tr class="table-row">
                            <td>Reposteria</td>
                            <td>20</td>
                            <td><a href="javascript:void(0);" class="badge badge-warning" data-toggle="modal" data-target="#coursedetail">Ver detalle</a></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-row">
                            <td>Reposteria</td>
                            <td>20</td>
                            <td><a href="javascript:void(0);" class="badge badge-warning" data-toggle="modal" data-target="#coursedetail">Ver detalle</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="coursedetail" tabindex="-1" role="dialog" aria-labelledby="courseDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseDetailLabel">Detalle de la calificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5><b>Curso: </b>Reposteria</h5>
                    </div>
                    <div class="col text-right">
                        <span class="badge badge-success">En curso</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Fecha inicio: 29/20/1087
                    </div>
                    <div class="col">
                        Fecha termino: 29/20/1087
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Docente: Juan Alba
                    </div>
                    <div class="col">
                        Turno: Mañana
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Criterio
                                </th>
                                <th>
                                    Calificación
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Trabajo número 1
                                </td>
                                <td>
                                    16
                                </td>
                            </tr>
                            <tr class="table-info">
                                <td>
                                    Promedio:
                                </td>
                                <td>
                                    20
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection