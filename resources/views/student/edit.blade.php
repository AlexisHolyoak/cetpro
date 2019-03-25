@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ficha de información personal <span class="text-danger"> (*Obligatorio)</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.update',$student) }}"  method="POST" files="true" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <img  src="{!! url('https://cloud-cube.s3.amazonaws.com/ranbla920cxv/public/'.$student->photo_path) !!}" name="output_photo" id="output_photo" alt="" class="rounded mx-auto d-block border border-primary" height="300" width="200">
                            </div>
                            <div class="form-group row">
                                <label for="student_code" class="col-sm-4 col-form-label text-md-right">Código de estudiante*</label>

                                <div class="col-md-6">
                                    <input id="student_code" type="text" class="form-control{{ $errors->has('student_code') ? ' is-invalid' : '' }}" name="student_code" value="{{$student->student_code}}" disabled>

                                    @if ($errors->has('student_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="external_student_code" class="col-sm-4 col-form-label text-md-right">Código de otro CETPRO</label>

                                <div class="col-md-6">
                                    <input id="external_student_code" type="text" class="form-control{{ $errors->has('external_student_code') ? ' is-invalid' : '' }}" name="external_student_code" value="{{$student->external_student_code}}"  >

                                    @if ($errors->has('external_student_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('external_student_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday_date" class="col-sm-4 col-form-label text-md-right">Fecha de cumpleaños*</label>

                                <div class="col-md-6">
                                    <input id="birthday_date" type="date" class="form-control{{ $errors->has('birthday_date') ? ' is-invalid' : '' }}" name="birthday_date" value="{{ $student->birthday_date}}" required >

                                    @if ($errors->has('birthday_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label text-md-right">Sexo*</label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="genderMale" name="gender" class="custom-control-input" value="1" required {{($student->gender ==1)? 'checked':'' }} >
                                        <label class="custom-control-label" for="genderMale">Masculino</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="genderWomen" name="gender" class="custom-control-input" value="0" {{($student->gender ==0)? 'checked':'' }} >
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
                                <label for="civil_status" class="col-sm-4 col-form-label text-md-right">Estado civil*</label>

                                <div class="col-md-6">
                                    <select name="civil_status" id="civil_status" class="custom-select" required >
                                        <option value="SOLTERO/A" {{($student->civil_status =='SOLTERO/A')?'selected':''}}>Soltero/a</option>
                                        <option value="COMPROMETIDO/A" {{($student->civil_status =='COMPROMETIDO/A')?'selected':''}}>Comprometido/a</option>
                                        <option value="CASADO/A" {{($student->civil_status =='CASADO/A')?'selected':''}}>Casado/a</option>
                                        <option value="DIVORCIADO/A" {{($student->civil_status =='DIVORCIADO/A')?'selected':''}}>Divorciado/a</option>
                                        <option value="VIUDO/A"  {{($student->civil_status =='VIUDO/A')?'selected':''}}>Viudo/a</option>
                                    </select>
                                    @if ($errors->has('civil_status'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('civil_status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="document_type" class="col-sm-4 col-form-label text-md-right">Tipo de documento*</label>

                                <div class="col-md-6">
                                    <select name="document_type" id="document_type" class="custom-select" required >
                                        <option value="DNI O LIBRETA ELECTORAL" {{($student->document_type =='DNI O LIBRETA ELECTORAL')?'selected':''}}>DNI o Libreta electoral</option>
                                        <option value="CARNET DE EXTRANJERIA" {{($student->document_type =='CARNET DE EXTRANJERIA')?'selected':''}}>Carnet de extranjeria</option>
                                        <option value="REGISTRO UNICO DE CONTRIBUYENTES" {{($student->document_type =='CREGISTRO UNICO DE CONTRIBUYENTESA')?'selected':''}}>Registro único de contribuyente</option>
                                        <option value="PASAPORTE" {{($student->document_type =='PASAPORTE')?'selected':''}}>Pasaporte</option>
                                        <option value="PARTIDA DE NACIMIENTO" {{($student->document_type =='PARTIDA DE NACIMIENTO')?'selected':''}}>Partida de nacimiento</option>
                                    </select>
                                    @if ($errors->has('document_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="document_number" class="col-sm-4 col-form-label text-md-right">Número de documento*</label>

                                <div class="col-md-6">
                                    <input id="document_number" type="number" class="form-control{{ $errors->has('document_number') ? ' is-invalid' : '' }}" name="document_number" value="{{$student->document_number}}" required >

                                    @if ($errors->has('document_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="education_level" class="col-sm-4 col-form-label text-md-right">Nivel de estudios*</label>

                                <div class="col-md-6">
                                    <select name="education_level" id="education_level" class="custom-select" required >
                                        <option value="INICIAL" {{($student->education_level =='INICIAL')?'selected':''}}>Inicial</option>
                                        <option value="PRIMARIA" {{($student->education_level =='PRIMARIA')?'selected':''}}>Primaria</option>
                                        <option value="SECUNDARIA" {{($student->education_level =='SECUNDARIA')?'selected':''}}>Secundaria</option>
                                        <option value="SUPERIOR" {{($student->education_level =='SUPERIOR')?'selected':''}}>Superior</option>
                                    </select>
                                    @if ($errors->has('education_level'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('education_level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="worker" class="col-sm-4 col-form-label text-md-right">¿Trabajas?*</label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="workerYes" name="worker" class="custom-control-input" value="1" required {{($student->worker==1)?'checked':'' }} >
                                        <label class="custom-control-label" for="workerYes">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="workerNo" name="worker" class="custom-control-input" value="0" {{($student->worker==0)?'checked':'' }} >
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
                                    <input id="phone_number" type="number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $student->phone_number}}" required >

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cellphone_number" class="col-sm-4 col-form-label text-md-right">Número de celular*</label>

                                <div class="col-md-6">
                                    <input id="cellphone_number" type="number" class="form-control{{ $errors->has('cellphone_number') ? ' is-invalid' : '' }}" name="cellphone_number" value="{{ $student->cellphone_number}}" required >

                                    @if ($errors->has('cellphone_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cellphone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meet_way" class="col-sm-4 col-form-label text-md-right">¿Como se entero de nosotros?*</label>

                                <div class="col-md-6">
                                    <input id="meet_way" type="text" class="form-control{{ $errors->has('meet_way') ? ' is-invalid' : '' }}" name="meet_way" value="{{ $student->meet_way}}" required >

                                    @if ($errors->has('meet_way'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('meet_way') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-center">                                
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                                <input type="button" class="btn btn-block" value="Cancelar">
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