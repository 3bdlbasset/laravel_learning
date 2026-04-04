<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            font-family: "Poppins"
        }
        table ,th ,td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            border-collapse: collapse;
            width: 700px;
            margin-top: 30px;
            /* border-radius: 10px; */
        
        }
        .sup{
            border: none;
            width: 100%;
            border-radius: 8px;
            padding: 10px 14px 10px 14px;
            background-color: #4272ff;
            color: white;
            font-weight: 700;
        }
        thead{
            background-color: rgb(5, 51, 79);
            color: white;
        }
    </style>
</head>
<body>


    @if($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <a href="employes/create">Ajouter Employe</a>
    <table class="table border">
        <thead>
                <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        

        @foreach ($employes as $index=>$employe)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employe->nom }}</td>
                <td>{{ $employe->salaire }}</td>
                <td>
                    <form action="{{ route('employe.destroy' , $employe->idemploye) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="sup" type="submit" onclick=" return confirm('Are u sure ')">Supprimer</button>
                    </form> 
                    <a href="{{ route("employe.edit" , $employe->idemploye)  }}" >Modifier</a>
                    <a href="{{ route("employe.show" , $employe->idemploye) }}">Voir</a>
                </td>
                
            </tr>
        
        @endforeach
    </table>
</body>
</html>