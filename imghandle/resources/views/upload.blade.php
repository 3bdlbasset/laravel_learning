<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
    @endif


    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="product">Produit</label>
        <input type="text" name="produit" id="produit"><br><br>
        <input type="file" name="image" id="image" accept="image/*">
        <button type="submit">Upload</button>
    </form>
</body>
</html>