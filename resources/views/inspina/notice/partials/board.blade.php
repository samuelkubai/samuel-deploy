<ul class="notes">
    @foreach($notices as $notice)
        <li>
            <div>
                <small>{{$notice->updated_at}}</small>
                <h4>{{$notice->title}}</h4>
                <p>{{$notice->message}}</p>
             </div>
        </li>
    @endforeach           
</ul>