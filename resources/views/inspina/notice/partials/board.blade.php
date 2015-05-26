<ul class="notes">
    @foreach($notices as $notice)
        <li>
            <div>
                <small>{{$notice->updated_at}}</small>
                <h4>{{$notice->title}}</h4>
                <p>{{$notice->message}}</p>
                <p> - @include('inspina.partials.name_tag', ['user' => $notice->user()->first()])</p>
                @if($group->user()->first()->id == \Auth::user()->id)
                    <a href="{{url('/notices/destroy/'. $notice->id)}}"><i class="fa fa-trash-o"></i></a>
                @endif
             </div>
        </li>
    @endforeach           
</ul>