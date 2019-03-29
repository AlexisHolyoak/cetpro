@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Ficha de información docente <span class="text-danger"> (*Obligatorio)</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.update',$teacher) }}">
                        @csrf
                        <div class="form-group row">
                            <img name="output_photo" id="output_photo" alt="" class="rounded mx-auto d-block border border-primary"
                                height="300" width="200" src="{!! url('https://cloud-cube.s3.amazonaws.com/'.$teacher->photo_path) !!}">
                        </div>
                        <div class="form-group row">
                            <label for="photo_path" class="col-sm-4 col-form-label text-md-right">Foto*</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path" name="photo_path"
                                        aria-describedby="photo_path" onchange="loadFile(event)" autofocus>
                                    <label class="custom-file-label" for="photo_path">Selecciona una foto tuya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-4 col-form-label text-md-right">Número de telefono</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    name="phone_number" value="{{ $teacher->phone_number }}">

                                @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cellphone_number" class="col-sm-4 col-form-label text-md-right">Número de
                                celular</label>
                            <div class="col-md-6">
                                <input id="cellphone_number" type="number" class="form-control{{ $errors->has('cellphone_number') ? ' is-invalid' : '' }}"
                                    name="cellphone_number" value="{{ $teacher->cellphone_number }}">

                                @if ($errors->has('cellphone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cellphone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
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
    var loadFile = function (event) {
        var output = document.getElementById('output_photo');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
