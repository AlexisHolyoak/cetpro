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
                        <div class="form-group row">
                            <img name="output_photo" id="output_photo" alt="" class="rounded mx-auto d-block border border-primary"
                                height="300" width="200" src="{!! url('https://cloud-cube.s3.amazonaws.com/ranbla920cxv/public/'.$teacher->photo_path) !!}">
                        </div>                       
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-4 col-form-label text-md-right">Número de telefono</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    name="phone_number" value="{{ $teacher->phone_number }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cellphone_number" class="col-sm-4 col-form-label text-md-right">Número de celular</label>
                            <div class="col-md-6">
                                <input id="cellphone_number" type="number" class="form-control{{ $errors->has('cellphone_number') ? ' is-invalid' : '' }}"
                                    name="cellphone_number" value="{{ $teacher->cellphone_number }}" disabled>
                            </div>
                        </div>
                        <div class="form-group text-center">
                          <a href="{{ route('teacher.edit',$teacher) }}" class="btn btn-warning btn-block">Editar</a>                                             
                      </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection