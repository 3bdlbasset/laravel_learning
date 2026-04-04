<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Modifier Employe</h2>
    <form action="{{ route('employe.update' , $employe->idemploye) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="{{ $employe->nom }}">

        <label for="sal"> Salaire : </label>
        <input type="number" name="salaire" id="salaire" value="{{ $employe->salaire }}">

        <button type="submit">Save</button>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body> 
</html>