<div class="modal fade modalCenter" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('file.destroy', 'file') }}" method="POST">
                @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-body">
                        <p>¿Estás seguro que deseas eliminar este elemento? NO podrás recuperarlo.</p>
    
                        <input type="hidden" name="file_id" id="file_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger pull-right"><i class="fas fa-trash"></i> Confirmar</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>