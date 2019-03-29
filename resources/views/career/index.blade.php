@extends('layouts.app')
<style>
    .card-custom {
        max-width: 400px;
    }
    p {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
      }
      .career-image{
          max-height:200px;
      }
</style>
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center">        
        @foreach ($careers as $career)
        <div class="card card-custom mx-2 mb-3">
            <img src="{!! url('https://cloud-cube.s3.amazonaws.com/'.$career->picture_path) !!}" alt="{{ $career->name }}" class="career-image card-img-top">
            <div class="card-body">
                <h4 class="card-title">{{ $career->name }}</h4>
                <p class="card-text" >{{ $career->description }}</p>                
            </div>
            <div class="card-footer">
                <a href="{{ route('career.show',$career) }}" class="btn btn-primary">Leer más</a>
            </div>
        </div>
        @endforeach        
    </div>
</div>
@endsection
