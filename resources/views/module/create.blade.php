<div class="modal fade" id="createModuleModal" tabindex="-1" role="dialog" aria-labelledby="createModuleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('module.store',$course) }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createModuleModalLabel">Nuevo modulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Curso:</b> {{ $course->name }} <br>
                <b>Horas:</b> {{ $course->hours_quantity }} <br>
                <b>Calificación:</b> {{ $course->qualification }} <br>
                <hr>
               
                    <div class="form-group">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">Fecha de culminación</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Profesor</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="academic_period">Periodo académico</label>
                        <input type="text" class="form-control" name="academic_period" id="academic_period">
                        <small class="form-text text-muted">Año más orden de periodo (ej.: 2018-1)</small>
                    </div>
                    <div class="form-group">
                        <label for="days">Días</label>
                        <input type="text" class="form-control" name="days" id="days">
                        <small class="form-text text-muted">Días de la semana separados por comas (ej.: Lunes, Martes)</small>
                    </div>
                    <div class="form-group">
                        <label for="shift">Turno</label>
                        <select name="shift" id="shift" class="form-control">
                            <option value="MAÑANA">MAÑANA</option>
                            <option value="TARDE">TARDE</option>
                            <option value="NOCHE">NOCHE</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar cambios">
            </div>
            </form>
        </div>
    </div>
</div>
