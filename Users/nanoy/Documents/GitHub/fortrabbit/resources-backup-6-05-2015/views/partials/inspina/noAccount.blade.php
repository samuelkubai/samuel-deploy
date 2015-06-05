@extends('inspina')

@section('content')
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Ooops!!You don't have any accounts</h3>

        <div class="error-desc">
            You need to create accounts for either schools or clients inorder to use this application.
            <br/><a href="{{ url('/patch') }}" class="btn btn-info m-t">Register client</a> or <a href="index.html" class="btn btn-primary m-t">Create a School</a>
        </div>
    </div>
    <div>
        <h1>Ooops!!</h1>
    </div>
@endsection