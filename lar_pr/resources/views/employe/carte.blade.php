<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .title{
            text-align: center;
            margin: 20px 0 ;
        }
        .container{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .card{
            border-radius: 10px;
            background: #fff;
            width: 250px;
            padding: 15px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            transition : 0.3s;
            text-align: center;
        }
        .card:hover{
            transform: translateY(-5px)
        }
        .search-cont{
            text-align: center
        }
    </style>
</head>
<body>
    <h3 class="title">Liste des Employes </h3>
    <div class="search-cont">
        <form action="" name="form1" method="get">
        <input type="search" onchange="form1.submit()" name="search1">
        <button type="submit">Search</button>
    </form>
    </div>
   
    <div class="container">
        @foreach ($employes as $employe)
            <div class="card">
                <h3>{{ $employe->nom }}</h3>
                <p><strong>ID:</strong>{{ $employe->idemploye }}</p>
                <p><strong>Salaire:</strong>{{ $employe->salaire }} DH</p>
             
            </div>
        
        @endforeach
    </div>
</body>
</html>