<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Consumer</title>
</head>
<body>
@auth
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <div class="display-4 text-center mb-3 bg-light">Ciao {{auth()->user()->name}}!</div>

        <div class="container">
            <div class="text-right">
                <button type="submit" class="btn btn-danger mb-3 text-right">Logout</button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle shadow rounded-4 overflow-hidden">
                    <thead class="table-primary text-center">
                    <tr>
                        <th>Titolo</th>
                        <th>Commento</th>
                        <th>Data</th>
                        <th>File</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($files as $file)
                        <tr class="file">
                            <td>{{$file->title}}</td>
                            <td>{{$file->comment}}"</td>
                            <td class="text-nowrap">{{$file->updated_at}}</td>
                            <td><a href="{{ route('files.download', basename($file->file)) }}" target="_blank">Scarica PDF</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <a href="{{ route('showLoginUser') }}" class="btn btn-primary">Login</a>

@endauth
</body>
</html>
