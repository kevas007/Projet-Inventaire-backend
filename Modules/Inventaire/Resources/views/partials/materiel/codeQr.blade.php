<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
</head>

<body>
    <div class="container mt-4">
        <h1>
            tete
            {{-- {{ dd($data) }} --}}
         {{-- @foreach ($data as $item ) --}}
             {{$data->nom }}
             <div class="card-body">
                {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string')) !!}
            </div>
        </h1>
    </div>

</body>

</html>
