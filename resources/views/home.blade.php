<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body background="home.jpg">

</body>
</html>
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <br><center></center><center><h5><h1><h3><h4><h2>SELAMAT DATANG</h1></h5></h2></h4></h3></center></center><br></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <center><center></center><h5><h1><h2><h3><h4>DI
                WEBSITE SD
                </h1>
                </h5>
                </h4>
                </h3>
                </h2>
                </center>
                </center>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</h1>
</h5>
</center>
</div>
</h1>
