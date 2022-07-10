@extends('layouts.app')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img style="max-height:150px" class="img-responsive img-thumbnail img-circle" src="{{asset('images/'.Auth::user()->photo)}}" alt="image"></li>
                            <li>{{Auth::user()->username}}</li>
                            <li><a class="btn btn-primary" href="doctor_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li class="active"><a href="{{url('doctor/subjects')}}">Doctor Subjects</a></li>
                            <li><a href="{{url('doctor/days')}}">Doctor Days</a></li>
                            <li><a href="{{url('doctor/day/timeslots')}}">Doctor Time Slots</a></li>
                            <li><a href="{{url('table/view')}}">Table View</a></li>
                            <li><a href="{{url('doctor/chat')}}">Chat</a></li>
                            <li><a href="{{url('student/marks')}}">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Doctor Subjects</div>
                        <div class="main_direct" id="doctor_subjects">
                            <!--Start FAQ Accordion-->
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!--Start Question 1-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-one">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                                Step 1 Choose Your Subjects
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-one">
                                        <div class="panel-body">
                                            <form id="subjects" role="form" method="post" action="{{url('doctor/subjects/add')}}" class="inputs">
                                                <div class="form-group">
                                                    {{csrf_field() }}
                                                </div>
                                                <div id="doctor_subjects_subject_code">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover text-center text-center">
                                                        <tr>
                                                                    <td>code</td>
                                                                    <td>name</td>
                                                                    <td>hours</td>
                                                                    <td>state</td>
                                                        </tr>
                                                        @foreach($subjects as $subject)
                                                        <tr>
                                                            <td>{{$subject->code}}</td>
                                                            <td>{{$subject->name}}</td>
                                                            <td>{{$subject->hours}}</td>
                                                            <td>
                                                                <div class="checkbox form-check">
                                                                    <label>
                                                                        <input name="subjects[]" type="checkbox" value="{{$subject->code}}"> <span class="label-text"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <input id="doctor_subjects_subjects" type="button" value="Add" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--End Question 1-->

                                <!--Start Question 2-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-two">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-two" aria-expanded="true" aria-controls="collapse-two">
                                                Step 2 Determine Subjects Teach Method
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-two">
                                        <div class="panel-body">
                                            <form role="form" class="inputs">
                                                <div class="form-group">
                                                    {{csrf_field() }}
                                                </div>
                                                <div id="doctor_subjects_teach_method" class="form-group">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input id="doctor_subjects_teach_methods" type="button" value="Add" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--End Question 2-->
                                <!--Start Question 3-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-two">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-three" aria-expanded="true" aria-controls="collapse-three">
                                                Step 3 Determine Subjects devision type
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-three" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-three">
                                        <div class="panel-body">
                                            <form role="form" class="inputs">
                                                <div class="form-group">
                                                    {{csrf_field() }}
                                                </div>
                                                <div id="doctor_subjects_devision_type" class="form-group">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input id="doctor_subjects_devision_types" type="button" value="Add" onclick="check_data_devision_type();" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--End Question 3-->
                            </div>
                            <!--End FAQ Accordion-->
                               
                            </div>
                    </div>
                </div>
                <div class="footer col-xs-12 text-center">
                    this content is copy righted by the team
                </div>
            </div>
        </div>
        @endsection
        