<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat Prêt de matériel</title>
    <style>
        body{
            width: 90%;
            margin: 0 auto;
        }
        .titre{
            background-color: #ddd;
            padding: 10px;

        }
        .section-signature{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .section-signature{
            margin-top: 20px;
            text-align: center;
        }
        .spacer{
            margin-right: 51.5%;
        }

    </style>
</head>

<body>
    <h1 class="titre">Convention de mise à disposition du matériel informatique</h1>

    <p><b>Je soussigné(e), {{    $data->preteur->firstname . ' ' .    $data->preteur->lastname }}</b>, déclare avoir, ce jour, mis à disposition de
        l'emprunteur:</p>
@if ($data->emprunteur !=null)
<p>Nom : {{ $data->emprunteur->nom }}</p>
<p>Prenom : {{ $data->emprunteur->prenom}}</p>
<p>Au nom et pour le compte de la formation <b>{{ $data->emprunteur->formation}}</b> - à l'adresse
<b>{{ $data->emprunteur->adresse}}</b>, le matériel suivant:</p>
@elseif ($data->team_id !=null)
<p>Nom : {{ $data->team->nom }}</p>
<p>Prenom : {{ $data->team->prenom}}</p>
<p>à l'adresse
<b>{{ $data->materiel->place->nom}}</b>, le matériel suivant:</p>

@else
<p>Nom : {{ $data->preteur->nom }}</p>
<p>Prenom : {{ $data->preteur->prenom}}</p>
<p>à l'adresse
<b>{{ $data->materiel->place->nom}}</b>, le matériel suivant:</p>

@endif

    <p>Nom du matériel: {{ $data->materiel->nom }}</p>
    <p>Type du matériel: {{ $data->materiel->type->nom }}</p>
    <h3>L'emprunteur: </h3>
    @if ($data->emprunteur !=null)
    <p>Confirme, en tant qu’élève de la {{ $data->emprunteur->formation}}, la réception du matériel ci-dessus
        visé qui est et demeure la propriété de Molengeek.
        Reconnait et atteste sur l’honneur avoir pris connaissance et être d’accord avec les conditions
        et termes relatifs à la mise à disposition du matériel informatique détaillés ci-dessous.
        S’engage à utiliser le matériel fourni avec soin, conformément à sa destination.
        S’engage en outre à signaler immédiatement tout dysfonctionnement, dégradation, perte ou vol.</p>
    <p>S’oblige à restituer l’intégralité du matériel à l'économat de l'école pour le {{\Carbon\Carbon::create($data->fin_contrat)->format('d/m/Y')}}<b>
        @elseif ($data->team_id !=null)
        <p>Confirme, en tant que membre de la  {{ $data->team->firstname }}, la réception du matériel ci-dessus
            visé qui est et demeure la propriété de Molengeek.
            Reconnait et atteste sur l’honneur avoir pris connaissance et être d’accord avec les conditions
            et termes relatifs à la mise à disposition du matériel informatique détaillés ci-dessous.
            S’engage à utiliser le matériel fourni avec soin, conformément à sa destination.
            S’engage en outre à signaler immédiatement tout dysfonctionnement, dégradation, perte ou vol.</p>
        @else
        <p>Confirme, en tant que membre de la  {{ $data->preteur->firstName }}, la réception du matériel ci-dessus
            visé qui est et demeure la propriété de Molengeek.
            Reconnait et atteste sur l’honneur avoir pris connaissance et être d’accord avec les conditions
            et termes relatifs à la mise à disposition du matériel informatique détaillés ci-dessous.
            S’engage à utiliser le matériel fourni avec soin, conformément à sa destination.
            S’engage en outre à signaler immédiatement tout dysfonctionnement, dégradation, perte ou vol.</p>
        @endif
    </b>
        au plus tard, et ce dans le même état que celui dans lequel le matériel se trouvait lors qu’il a été
        mis à sa disposition, compte tenu de son usure normale. En cas de départ définitif au cours de
        l’année académique, le matériel devra être immédiatement restitué</p>

    <p>Fait à {{  $data->materiel->place->nom}}, le {{\Carbon\Carbon::now()->format('d/m/Y')}}</p>
    <span class="section-signature">
        <span class="spacer">Signature du prêteur</span>
        {{-- <span class="spacer"></span> --}}
        <span>Signature de l'emprunteur</span>
    </span>
</body>

</html>
