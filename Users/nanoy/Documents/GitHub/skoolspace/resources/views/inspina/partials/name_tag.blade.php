@if(\Auth::user()->id == $user->id)
    {{ 'You' }}
@else
    {{ $user->firstName . ' ' . $user->lastName }}
@endif