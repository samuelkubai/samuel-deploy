<span align="center"><a class="btn btn-info btn-block m"
@if(!$events->hasMorePages())
disabled="true"
@endif
href="{{ $events->nextPageUrl() }}"><i class="fa fa-arrow-down"></i> Previous Events
</a></span>