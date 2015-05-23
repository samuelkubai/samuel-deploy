<a class="btn btn-primary btn-block m"
@if(!$statuses->hasMorePages())
disabled="true"
@endif
href="{{ $statuses->nextPageUrl() }}"><i class="fa fa-arrow-down"></i> Previous Posts
</a>