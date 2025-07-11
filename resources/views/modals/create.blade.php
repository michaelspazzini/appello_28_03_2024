<!-- Modale per inserimento -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Inserisci nuovo materiale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-content-body">
                <div class="container mt-4 text-left">
                    <form action="{{route('files.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                            <span class="badge badge-danger" id="spanTitle" style="display:none">Consentito solo: lettere, numeri e spazi</span>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File pdf</label>
                            <input type="file" id="file" name="file" class="form-control" accept="application/pdf">
                            <span class="badge badge-danger" id="spanFile" style="display:none">File supportato: pdf</span>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Commento</label>
                            <input type="text" id="comment" name="comment" class="form-control">
                            <span class="badge badge-danger" id="spanComment" style="display:none">Consentito solo: lettere, numeri e spazi</span>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="public" value="0" />
                            <label for="public_checkbox" class="form-label">Pubblica materiale</label>
                            <input type="checkbox" name="public" id="public_checkbox" value="1" />
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="submit">Aggiungi</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('#insertModal form');
            if (!form) return;

            let inputText = document.getElementById('title');
            let inputComment = document.getElementById('comment');
            let inputFile = document.getElementById('file');
            let submit = document.getElementById('submit');

            const regex = /^[a-zA-Z0-9\s]+$/;

            submit.addEventListener('click', (e) => {
                if (!regex.test(inputText.value.trim())) {
                    document.getElementById('spanTitle').style.display = 'block';
                    inputText.focus();
                    return false;
                }
                else {
                    // Nasconde eventuale errore precedente
                    document.getElementById('spanTitle').style.display = 'none';
                }
                const trim = inputComment.value.trim();
                // Verifica solo se non è vuoto
                if (trim !== '' && !regex.test(trim)) {
                    document.getElementById('spanComment').style.display = 'block';
                    inputComment.focus();
                    return false;
                } else {

                    document.getElementById('spanComment').style.display = 'none';
                }
                if (inputFile.files.length === 0 || inputFile.files[0].type !== 'application/pdf') {
                    document.getElementById('spanFile').style.display = 'block';
                    inputFile.focus();
                    return false;
                }
                else {
                    document.getElementById('spanFile').style.display = 'none';
                }
            })
        });
    </script>
@endpush
