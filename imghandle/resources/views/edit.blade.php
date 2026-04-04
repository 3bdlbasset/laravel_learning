<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Modifier produit </h3>
    <form action="{{ route('products.update' , $product->idimage) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Product : </label>
        <input type="text" name="produit" id="produit" value="{{ $product->produit }}"><br><br>
        <label for="">Produit Image : </label>

        <input type="file" name="image" id="image" ><br><br>
            @if ($product->imagepath)
                <img src="{{ asset('storage/' . $product->imagepath) }}" alt="">
            @endif

            <br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>