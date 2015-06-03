@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                @include('inspina.partials.to_group_feed_nav')
                    <div class="col-md-12">
                        @include('inspina.notice.partials.board')
                    <br>
                    </div>
                    <div class="text-center"><?php echo $notices->render() ?></div>
                    <div class="row col-md-12" >
                    @include('inspina.notice.partials.pin')
                    </div>
             </div>
    </div>
@endsection

@section('validation')
                $("#createnoticebtn").click(function()
                    {

                        if(!validateText("title"))
                            return false;

                        if(!validateText("message"))
                            return false;
                        $('form#createnoticeform').submit();

                    })
@endsection