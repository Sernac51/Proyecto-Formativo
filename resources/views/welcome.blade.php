<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>AJ aluminio y decoración</title>
</head>
<body class="d-flex h-100 text-center text-white">
    <div class="d-flex h-100 w-100 p-3 mx-autpt-5o flex-column main-container">
        <div class="container mt-5">
            <h1 class="text-center" id="aj">AJ</h1>
            <h1 class="text-center fs-3" >Aluminio y decoración</h1>
        </div>
        <div class="contauner-fliud">
            <main class="mx-3">
                <p class="fs-4 fw-lighter pb-5 " id="textow">AJ aluminio y decoración es una empresa que se preocupa por ofrecer productos de calidad a sus clientes.</p>
                    <div class="row">
                        <div>
                            <a href="{{ route('ventas.index')}}" class="btn btn-outline-warning fs-2 w-25" >Ingresar</a> 
                        </div>   
                    </div>  
            </main>
        </div>
    </div>
</body>
</html>