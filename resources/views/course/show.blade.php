@extends('layouts.app')
<style>
    .card-custom {
            max-width: 800px;
        }                
    </style>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h1 class="display-4">{{ $career->name }}</h1>
    </div>
    <div class="row">
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header">
                    Visualizar curso
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <img id="output_photo" name="output_photo" src="{{ asset('storage/'.$course->picture_path) }}"
                            alt="Imagen" class="card-img-top" width="400" height="350">
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" value="{{ $course->name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qualification" class="col-sm-4 col-form-label text-md-right">Calificación</label>
                        <div class="col-md-6">
                            <select name="qualification" id="" class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}"
                                disabled>
                                <option value="OBLIGATORIO"
                                    {{ ($career->qualification =='OBLIGATORIO')? ' selected' :'' }}>Obligatorio</option>
                                <option value="ELECTIVO" {{ ($career->qualification =='ELECTIVO')? ' selected' :'' }}>Electivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hours_quantity" class="col-sm-4 col-form-label text-md-right">Cantidad de horas</label>
                        <div class="col-md-6">
                            <input type="number" name="hours_quantity" class="form-control" value="{{ $course->hours_quantity }}"
                                disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label text-md-right">Descripción del
                            curso</label>

                        <div class="col-md-6">
                            <textarea name="description" id="description" rows="5" class="form-control" value="{{ old('description') }}"
                                disabled>{{ $course->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <a href="{{ route('course.edit',$course) }}" class="btn btn-warning btn-block">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header">
                    <span>Lista de cursos registrados</span>
                    <a href="{{ route('course.create',$career) }}" class="btn btn-success btn-sm float-right">Nuevo
                        curso</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Calificación</th>
                                    <th>Horas</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($career->course as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->qualification }}</td>
                                    <td>{{ $course->hours_quantity }}</td>
                                    <td>{{ $course->state }}</td>
                                    <td>
                                        <a href="{{ route('course.show',$course) }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></a>
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
    <div class="row my-2">
        <div class="col-md-12 my-2">
            <div class="card">
                <div class="card-header">
                    <span>Modulos</span>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#createModuleModal" class="btn btn-success btn-sm float-right">Crear
                        nuevo modulo</a>
                </div>
                <div class="card-body">
                    @include('module.index')
                </div>
            </div>
        </div>
    </div>
</div>
@include('module.create')
@endsection
<script>
    //previsualizar foto
    var loadFile = function (event) {
        var output = document.getElementById('output_photo');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
