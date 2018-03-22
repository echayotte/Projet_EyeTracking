<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form method="POST" enctype="multipart/form-data">         

    @csrf
        <input type="number" name="numeroPage" placeholder="numero de page">
        <!-- <input type="url" name="image" placeholder="url image"> -->
        <input type="file" name="filename"/>
        <input type="submit" value="entrer" name="submit">
        
    </form>

</body>
</html>