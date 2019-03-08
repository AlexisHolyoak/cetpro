@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <h1 class="display-4">{{ $career->name }}</h1>      
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Visualizar curso
                </div>
                <div class="card-body">
                    <form action="{{ route('course.store',$course) }}" method="POST" files="true" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <img id="output_photo" name="output_photo" src="{{ asset('storage/'.$course->picture_path) }}" alt="Imagen" class="card-img-top" width="400"
                                height="350">
                        </div>                        

                        <div class="form-group row">
                            <label for="picture_path" class="col-sm-4 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="picture_path" name="picture_path"
                                        aria-describedby="picture_path" onchange="loadFile(event)" autofocus >
                                    <label class="custom-file-label" for="picture_path">Selecciona una foto para el
                                        curso</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                          <div class="col-md-6">
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $course->name }}" >
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualification" class="col-sm-4 col-form-label text-md-right">Calificación</label>
                            <div class="col-md-6">
                                <select name="qualification" id="" class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}" >
                                    <option value="OBLIGATORIO" {{ ($career->qualification =='OBLIGATORIO')? ' selected' :'' }}>Obligatorio</option>
                                    <option value="ELECTIVO" {{ ($career->qualification =='ELECTIVO')? ' selected' :'' }}>Electivo</option>
                                </select>

                                @if ($errors->has('qualification'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('qualification') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hours_quantity" class="col-sm-4 col-form-label text-md-right">Cantidad de horas</label>
                            <div class="col-md-6">
                                <input type="number" name="hours_quantity" class="form-control{{ $errors->has('hours_quantity') ? ' is-invalid' : '' }}" value="{{ $course->hours_quantity }}" >
                                @if ($errors->has('hours_quantity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hours_quantity') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">Descripción del curso</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    value="{{ old('description') }}">{{ $course->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-block"  value="Actualizar">                            
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">Atras</a>
                        </div>
                    </form>
                </div>
            </div>                        
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Lista de cursos registrados
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
                                <a href="{{ route('course.show',$course) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('course.edit',$course) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></a>
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
</div>
@endsection
<script>
    //previsualizar foto
    var loadFile = function (event) {
        var output = document.getElementById('output_photo');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
