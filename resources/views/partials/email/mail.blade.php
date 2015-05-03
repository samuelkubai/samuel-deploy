    <div class="page-title" style="display:none"> <a href="#" id="btn-back"><i class="icon-custom-left"></i></a>
        <h3>Back- <span class="semi-bold">Inbox</span></h3>
    </div>
    <div class="row"  id="inbox-wrapper">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple" >
                        <div class="grid-body no-border email-body" >
                            <br>
                            <div class="row-fluid" >
                                <div class="row-fluid dataTables_wrapper">
                                    <h2 class=" inline">{{ $title }} </h2>
                                    <div class="btn-group m-l-10 m-b-10">
                                        <a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span class="caret single"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <div class="pull-right margin-top-20">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <ul>
                                                <li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                                <li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
                                                <li class="next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="dataTables_info hidden-xs" id="example_info">Showing <b>1 to 10</b> of 14 entries</div></div>
                                    <div class="clearfix"></div>
                                </div>

                                <div id="email-list">
                                    <table class="table table-striped table-fixed-layout table-hover" id="emails" >
                                        <thead>
                                        <tr>
                                            <th class="small-cell"></th>
                                            <th class="small-cell"></th>
                                            <th class="medium-cell"></th>
                                            <th ></th>
                                            <th class="medium-cell"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mails as $mail)

                                                <tr>

                                                    <td  class="small-cell v-align-middle">
                                                        <div class="checkbox check-success ">
                                                            <input id="checkbox8" type="checkbox" value="1" >
                                                            <label for="checkbox8"></label>
                                                        </div>
                                                    </td>
                                                    <td  class="small-cell v-align-middle">
                                                        <div class="star">
                                                            <input id="checkbox9" type="checkbox" value="1" checked >
                                                            <label for="checkbox9"></label>
                                                        </div>
                                                    </td>
                                                        <td  class="clickable v-align-middle"><a href="{{ url($path.$mail->id) }}">{{ $mail->role }}</a> </td>
                                                    <td  class="clickable tablefull v-align-middle"><span class="muted"><b>Subject: </b>{{ $mail->subject }}</span></td>
                                                    <td class="clickable"><span class="muted">{{ $mail->updated_at }} </span></td>

                                                </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="preview-email-wrapper" style="display:none">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4></h4>
                            <div class="tools">
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="grid-body no-border" style="min-height: 850px;">
                            <div class="" >
                                <h1 id="emailheading">Meeting</h1>
                                <br>
                                <div class="control">
                                    <div class="pull-left">
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                                David Nester
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <label class="inline"><span class="muted">&nbsp;&nbsp;to</span> <span class="bold small-text">johnsmith@skyace.com</span></label>
                                    </div>
                                    <div class="pull-right">
                                        <span class="muted small-text">August 5 2013 11.30PM</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <div class="email-body">
                                    <p>Thank you for taking the time to meet with me and other representatives of the last week regarding the challenges facing public transportation, especially. We enjoyed meeting with you and . I’m glad we had the opportunity to discuss an issue that affects so many people in [city/state/community]. We especially appreciate your commitment to [describe any commitment made by the official].
                                        The [coalition name] believes that public transportation is vital to quality of life of our community. As we discussed …
                                        Our coalition would greatly appreciate your support  in ensuring that public transportation is widely available to all who need it – especially the people living in . On behalf of all our members and the thousands of citizens they represent, I want to thank you for taking the time out of your busy schedule to discuss this important matter.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
