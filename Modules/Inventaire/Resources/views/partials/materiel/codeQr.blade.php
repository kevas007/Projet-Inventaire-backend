<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <h1>
            {{-- {{ dd($data) }} --}}
            <div class="card-body">
                <img src="data:image/png;base64, {!! base64_encode(
    QrCode::format('svg')->size(500)
    ->errorCorrection('H')
    ->generate(URL::to('/inventaire/materiel/'.$data->token) ),
) !!}>
            </div>
        </h1>
    </div>

</body>

</html>
