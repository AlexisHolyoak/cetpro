@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          Registro de carrera
        </div>
        <div class="card-body">
          <form action="">
            <div class="form-group row">
                <img id="output_photo" name="output_photo" src="" alt="Imagen" class="card-img-top" width="400" height="350">
            </div>
            <div class="form-group row">
              <label for="photo_path" class="col-sm-4 col-form-label text-md-right">Imagen</label>
                <div class="col-md-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="photo_path" name="photo_path" aria-describedby="photo_path" onchange="loadFile(event)" autofocus>
                      <label class="custom-file-label" for="photo_path">Selecciona una foto para la carrera</label>
                    </div>
                 </div>  
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="nombre de la carrera" >

                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif  
              </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-4 col-form-label text-md-right">Descripción de la carrera</label>

                <div class="col-md-6">                    
                    <textarea name="description" id="description"  rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}" ></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary btn-block" value="Registrar">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
          </form>                   
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<script>
  //previsualizar foto
  var loadFile = function(event) {
      var output = document.getElementById('output_photo');
      output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>