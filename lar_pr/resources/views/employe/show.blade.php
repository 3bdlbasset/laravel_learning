<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Detail de l'employe</h2>
        <div class="card">
            <p><strong>ID : </strong>{{ $employe->idemploye }}</p>
            <p><strong>NOm : </strong>{{ $employe->nom }}</p>
            <p><strong>Salaire : </strong>{{ $employe->salaire }} DH</p>
        </div>

        <a href="{{ route('employes.index') }}">Retour</a>
    </div>
</body>
</html>