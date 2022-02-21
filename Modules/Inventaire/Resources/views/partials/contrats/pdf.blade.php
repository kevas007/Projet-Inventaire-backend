<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat Prêt de matériel</title>
    <style>
        body{
            width: 50%;
            margin: 0 auto;
        }
        .titre{
            background-color: #ddd;
            padding: 10px;

        }
        .section-signature{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <h1 class="titre">Convention de mise à disposition du matériel informatique</h1>

    <p><b>Je soussigné(e), {{ $preteur->firstname . ' ' . $preteur->lastname }}</b>, déclare avoir, ce jour, mis à disposition de
        l'emprunteur:</p>
    <p>Nom : {{ $emprunteur->nom }}</p>
    <p>Prenom : {{ $emprunteur->prenom}}</p>
    <p>Date de naissance : {{ \Carbon\Carbon::parse($emprunteur->date_naissance)->format('d-m-Y')}}</p>
    <p>Au nom et pour le compte de la formation <b>{{ $emprunteur->formation}}</b> - à l'adresse
        <b>{{ $emprunteur->adresse}}</b>, le matériel suivant:</p>
    <p>Nom du matériel: {{ $materiel->nom }}</p>
    <p>Type du matériel: {{ $materiel->type->nom }}</p>
    <h3>L'emprunteur: </h3>
    <p>Confirme, en tant qu’élève de la {{ $emprunteur->formation}}, la réception du matériel ci-dessus
        visé qui est et demeure la propriété de Molengeek.
        Reconnait et atteste sur l’honneur avoir pris connaissance et être d’accord avec les conditions
        et termes relatifs à la mise à disposition du matériel informatique détaillés ci-dessous.
        S’engage à utiliser le matériel fourni avec soin, conformément à sa destination.
        S’engage en outre à signaler immédiatement tout dysfonctionnement, dégradation, perte ou vol.</p>
    <p>S’oblige à restituer l’intégralité du matériel à l'économat de l'école pour le <b>{{$duree}}</b>
        au plus tard, et ce dans le même état que celui dans lequel le matériel se trouvait lors qu’il a été
        mis à sa disposition, compte tenu de son usure normale. En cas de départ définitif au cours de
        l’année académique, le matériel devra être immédiatement restitué</p>

    <p>Fait à {{$materiel->place->nom}}, le {{\Carbon\Carbon::now()->format('d/m/Y')}}</p>
    <div class="section-signature">
        <p>Signature du prêteur</p>
        <p>Signature de l'emprunteur</p>
    </div>
</body>

</html>
