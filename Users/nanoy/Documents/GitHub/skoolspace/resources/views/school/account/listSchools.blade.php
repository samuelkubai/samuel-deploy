@extends('default')

@section('content')
    <!-- Dashboard or home view: List of Schools, Number of clients signed on, ... -->
    <h2>Your schools</h2>
    <ol>
    @foreach($schools as $school)
        <li><a href="{{ url('/admin/school/'.$school->username) }}" >{{ $school->schoolName }}</a></li>
    @endforeach
    </ol>
    <!-- End of the Dashboard section -->
    <!-- Partials directory: school.account.partials -->
@stop

