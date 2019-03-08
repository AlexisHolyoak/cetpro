<div class="card-deck">
    @foreach ($modules as $module)
    <div class="card">
        <div class="card-header">
            <span><b>Turno: </b>{{ $module->shift }}</span>
            <a href="" class="btn btn-warning btn-sm float-right"><i class="fa fa-pencil-alt"></i></a>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <b>Curso:</b>
                        </td>
                        <td>
                            {{ $module->course->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Fecha de inicio: </b>
                        </td>
                        <td>
                            {{ $module->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Fecha de culminación: </b>
                        </td>
                        <td>
                            {{ $module->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Profesor: </b>
                        </td>
                        <td>
                            {{ $module->teacher->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Periodo académico: </b>
                        </td>
                        <td>
                            {{ $module->academic_period }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Días: </b>
                        </td>
                        <td>
                            {{ $module->days }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('evaluation.create',$module) }}" class="btn btn-success btn-sm">Criterios de evaluación</a>
        </div>
    </div>
    @endforeach
</div>
