@extends('layouts.app')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Modulos
                </div>
                <div class="card-body">                  
                  @include('module.index')
                </div>                
              </div>
        </div>
      </div>
    </div>
@endsection