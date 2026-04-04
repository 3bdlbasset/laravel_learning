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
        
        thead{
            background-color: rgb(5, 51, 79);
            color: white;
        }
    </style>
</head>
<body>
    <a href="{{ route('products.create') }}">upload</a>
    <div class="container">
        <table>
            <thead>
                <th>Produit</th>
                <th>image</th>
                <th>actions</th>
            </thead>
            @foreach ($produits as $produit)
                <tbody>
                    <tr>
                        <td>{{ $produit->produit }}</td>
                        <td>
                            @if ($produit -> imagepath)
                                <img src="{{ asset('storage/' . $produit->imagepath) }}" width="170" alt="img">
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('products.destroy' , $produit->idimage)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('products.edit' , $produit->idimage) }}">Update</a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
      
        </table>
    </div>
</body>
</html>