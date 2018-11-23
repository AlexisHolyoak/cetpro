@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Ficha de información personal
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group row">
                            <img name="output_photo" id="output_photo" alt="" class="rounded mx-auto d-block border border-primary" height="300" width="200">
                        </div>
                        <div class="form-group row">
                            <label for="photo_path" class="col-sm-4 col-form-label text-md-right">Foto</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path" name="photo_path" aria-describedby="photo_path" onchange="loadFile(event)" autofocus>
                                    <label class="custom-file-label" for="photo_path">Selecciona una foto tuya</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday_date" class="col-sm-4 col-form-label text-md-right">Fecha de cumpleaños</label>

                            <div class="col-md-6">
                                <input id="birthday_date" type="date" class="form-control{{ $errors->has('birthday_date') ? ' is-invalid' : '' }}" name="birthday_date" value="{{ old('birthday_date') }}" required >

                                @if ($errors->has('birthday_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="genderMale" name="gender" class="custom-control-input" value="1" required @if(old('gender')) checked @endif>
                                    <label class="custom-control-label" for="genderMale">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="genderWomen" name="gender" class="custom-control-input" @if(old('gender')) checked @endif>
                                    <label class="custom-control-label" for="genderWomen">Femenino</label>
                                </div>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="civil_status" class="col-sm-4 col-form-label text-md-right">Estado civil</label>

                            <div class="col-md-6">
                                <select name="civil_status" id="civil_status" class="custom-select" required>
                                    <option value="SOLTERO/A">Soltero/a</option>
                                    <option value="COMPROMETIDO/A">Comprometido/a</option>
                                    <option value="CASADO/A">Casado/a</option>
                                    <option value="DIVORCIADO/A">Divorciado/a</option>
                                    <option value="VIUDO/A">Viudo/a</option>
                                </select>
                                @if ($errors->has('civil_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('civil_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document_type" class="col-sm-4 col-form-label text-md-right">Tipo de documento</label>

                            <div class="col-md-6">
                                <select name="document_type" id="document_type" class="custom-select" required>
                                    <option value="DNI O LIBRETA ELECTORAL">DNI o Libreta electoral</option>
                                    <option value="CARNET DE EXTRANJERIA">Carnet de extranjeria</option>
                                    <option value="REGISTRO UNICO DE CONTRIBUYENTES">Registro único de contribuyente</option>
                                    <option value="PASAPORTE">Pasaporte</option>
                                    <option value="PARTIDA DE NACIMIENTO">Partida de nacimiento</option>
                                </select>
                                @if ($errors->has('document_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document_number" class="col-sm-4 col-form-label text-md-right">Número de documento</label>

                            <div class="col-md-6">
                                <input id="document_number" type="number" class="form-control{{ $errors->has('document_number') ? ' is-invalid' : '' }}" name="document_number" value="{{ old('document_number') }}" required autofocus>

                                @if ($errors->has('document_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document_type" class="col-sm-4 col-form-label text-md-right">Tipo de documento</label>

                            <div class="col-md-6">
                                <select name="document_type" id="document_type" class="custom-select" required>
                                    <option value="DNI O LIBRETA ELECTORAL">DNI o Libreta electoral</option>
                                    <option value="CARNET DE EXTRANJERIA">Carnet de extranjeria</option>
                                    <option value="REGISTRO UNICO DE CONTRIBUYENTES">Registro único de contribuyente</option>
                                    <option value="PASAPORTE">Pasaporte</option>
                                    <option value="PARTIDA DE NACIMIENTO">Partida de nacimiento</option>
                                </select>
                                @if ($errors->has('document_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="education_level" class="col-sm-4 col-form-label text-md-right">Nivel de estudios</label>

                            <div class="col-md-6">
                                <select name="education_level" id="education_level" class="custom-select" required>
                                    <option value="INICIAL">Inicial</option>
                                    <option value="PRIMARIA">Primaria</option>
                                    <option value="SECUNDARIA">Secundaria</option>
                                    <option value="SUPERIOR">Superior</option>
                                </select>
                                @if ($errors->has('education_level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('education_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker" class="col-sm-4 col-form-label text-md-right">¿Trabajas?</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="workerYes" name="worker" class="custom-control-input" value="1" required @if(old('worker')) checked @endif>
                                    <label class="custom-control-label" for="workerYes">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="workerNo" name="worker" class="custom-control-input" value="0" @if(!old('worker')) checked @endif>
                                    <label class="custom-control-label" for="workerNo">No</label>
                                </div>

                                @if ($errors->has('worker'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('worker') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-4 col-form-label text-md-right">Número de teléfono</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required >

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cellphone_number" class="col-sm-4 col-form-label text-md-right">Número de celular</label>

                            <div class="col-md-6">
                                <input id="cellphone_number" type="number" class="form-control{{ $errors->has('cellphone_number') ? ' is-invalid' : '' }}" name="cellphone_number" value="{{ old('cellphone_number') }}" required >

                                @if ($errors->has('cellphone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cellphone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meet_way" class="col-sm-4 col-form-label text-md-right">¿Como se entero de nosotros?</label>

                            <div class="col-md-6">
                                <input id="meet_way" type="number" class="form-control{{ $errors->has('meet_way') ? ' is-invalid' : '' }}" name="meet_way" value="{{ old('meet_way') }}" required >

                                @if ($errors->has('meet_way'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('meet_way') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                            <input type="submit" class="btn btn-block" value="Cancelar">
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