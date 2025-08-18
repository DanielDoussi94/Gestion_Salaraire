<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <title>Page de connexion</title>
</head>
<body>
    
<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />



<form method="post" action="{{route('HandleLogin')}}">

    @csrf
    @method('POST')

    <!-- {{ Hash::make('Azerty') }} -->
    <div class="box">
        <h1>Espace de connexion</h1>

        @if(Session::get('msg_error'))
            <b> {{Session::get('msg_error')}} </b>
            
        @endif

        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit"> Connexion</button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
    <!-- End Box -->
</form>

</body>
</html>