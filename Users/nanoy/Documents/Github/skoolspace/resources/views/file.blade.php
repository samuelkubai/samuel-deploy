@extends('inspina')

@section('content')


    {{ $message }}
   <form action="{{ url( '/test/') }}" method="post" enctype="multipart/form-data">


    <input type="file" name="file" class="form-group-lg"/>

    <input type="submit" value="Submit" class="form-group btn btn-info"/>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>
@endsection