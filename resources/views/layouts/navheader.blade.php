<li class="nav-item {{ Route::currentRouteNamed('student.home') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('student.home')}}">Inicio <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item {{ Route::currentRouteNamed('career.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('career.index') }}">Carreras <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Notas <span class="sr-only">(current)</span></a>
</li>
