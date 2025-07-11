<!-- Modale per inserimento -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-content-body">
                <div class="container mt-4 text-left">
                    <form action="{{route('files.delete')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <h3> Sicuro di voler eliminare tutti i file? </h3>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit">Elimina</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
