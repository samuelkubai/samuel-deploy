
     <div class="col-md-3 pull-left">
          <a class="btn btn-sm btn-info" href="{{ url($group->username) }}"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Back to group feed</a>
     </div>
@if($folder->isSubFolder())
     <div class="col-md-3 pull-left">
          <a class="btn btn-sm btn-white" href="{{ url('manager/'.$group->username.'/'. $folder->folder_id) }}"><i class="glyphicon glyphicon-arrow-up"></i> &nbsp; Up One Directory</a>
     </div>
 @endif