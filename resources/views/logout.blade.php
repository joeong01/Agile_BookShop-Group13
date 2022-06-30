
    @if( session()->get('type') == "user"){
    
        @extends('userFrame')
        @section('content')
    }
    @else{
        @extends('adminFrame')
        @section('content')
    }
    @endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <?php 
        session(['id' => "none"]);
        session(['type' => "none"]);
        Session::save();
        header("Location: http://127.0.0.1:8000/");
        exit();
    ?>
</body>

@endsection()