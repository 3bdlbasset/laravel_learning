<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un employe</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employe.store') }}" method="post">
        @csrf
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom">

        <label for="sal">Salaire : </label>
        <input type="number" name="salaire" id="salaire">

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>