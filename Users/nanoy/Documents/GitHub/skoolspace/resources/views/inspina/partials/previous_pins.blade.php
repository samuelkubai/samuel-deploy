<a class="btn btn-primary btn-block m"
@if(!$notices->hasMorePages())
disabled="true"
@endif
href="{{ $notices->nextPageUrl() }}"><i class="fa fa-arrow-down"></i> Previous Pins
</a>