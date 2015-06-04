<div class="row">
    <div class="col-md-12">
        <h3>{{ $school->schoolName }}</h3>
        <p class="muted"><b>Motto: </b>{{ $school->schoolMotto }}</p>
        <h4 class="pull-right "> Account Information </h4>
        <span class="col-md-12"><hr></span>
        <br>
        <br>
        <br>
        <br>
    <div>
        <form action="{{ url('/'.$school->username.'/update/') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="row form-row">
                    <div class="col-md-6">
                        <input name="email" value="{{ $school->email }}" type="email" class="form-control" placeholder="School's Email">
                    </div>
                    <div class="col-md-6">
                        <input name="url" value="{{ $school->url }}" type="text" class="form-control" placeholder="School's Main Site Url">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-12">
                        <input name="schoolName" value="{{ $school->schoolName }}" type="text" class="form-control" placeholder="School's Name">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-12">
                        <input name="schoolMotto" value="{{ $school->schoolMotto }}" type="text" class="form-control" placeholder="School's Motto">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-6">
                        <input name="telNumber" value="{{ $school->telNumber }}" type="text" class="form-control" placeholder="School's Tel.Number">                                        </div>
                    <div class="col-md-6">
                        <input name="username" value="{{ $school->username }}" type="text" class="form-control" placeholder="Unique Username">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/'.$school->username.'/delete/') }}" class="btn btn-danger">Delete</a>
                <button type="submit" class="btn btn-white">Save</button>
            </div>
        </form>
    </div>
</div>
    </div>