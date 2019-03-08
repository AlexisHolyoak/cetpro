<!-- Modal -->
<div class="modal fade" id="evaluationModal-edit{{ $evaluation->id }}" tabindex="-1" role="dialog" aria-labelledby="evaluationModal-editLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('evaluation.update',$module) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="evaluationModal-editLabel">Actualizar Criterio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Actualizar criterio de evaluación para este modulo, todos los alumnos de este modulo seran
                    evaluados y calificados dependiendo de los criterios creados
                    <hr>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Criterio de evaluación:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Escriba el nuevo criterio..." value="{{ $evaluation->name }}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>