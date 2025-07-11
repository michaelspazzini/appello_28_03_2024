<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>
<body>
@auth
    @if(session('success'))
        <div class="alert alert-success ml-3 mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger ml-3 mt-3">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <div class="display-4 text-center mb-3 bg-light">Ciao {{auth()->user()->name}}!</div>
        <div class="container mb-2 text-right">
            <button type="submit" class="btn btn-danger ">Logout</button>
        </div>
    </form>

    <div class="container mb-2 text-right">
        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#insertModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            Aggiungi file
        </button>
        <!-- Inclusione della modale -->
        @include('modals.create')
        @stack('scripts')


        <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#deleteModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
            Elimina tutti i file
        </button>
        @include('modals.delete')
    </div>

    @if (!empty($files) && count($files) !== 0)
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow rounded-4 overflow-hidden">
                <thead class="table-primary text-center">
                <tr>
                    <th>Titolo</th>
                    <th>Commento</th>
                    <th>Data</th>
                    <th>Pubblico</th>
                    <th>File</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($files as $file)
                    <tr class="file">
                        <td>{{$file->title}}</td>
                        <td>{{$file->comment}}</td>
                        <td class="text-nowrap">{{$file->updated_at}}</td>
                        <td>{{$file->is_public}}</td>
                        <td><a href="{{ route('files.download', basename($file->file)) }}" target="_blank">Scarica PDF</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="display-5 text-center mb-3">Non hai pubblicato alcun materiale</div>
    @endif
    @else
        <a href="{{ route('showLoginUser') }}" class="btn btn-primary">Login</a>
    @endauth
</body>
</html>
