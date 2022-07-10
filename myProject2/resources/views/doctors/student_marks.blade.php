@extends('layouts.app')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="{{asset('images/'.Auth::user()->photo)}}" alt="image"></li>
                            <li>{{Auth::user()->username}}</li>
                            <li><a class="btn btn-primary" href="student_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="{{url('doctor/subjects')}}">Doctor Subjects</a></li>
                            <li><a href="{{url('doctor/days')}}">Doctor Days</a></li>
                            <li><a href="{{url('doctor/day/timeslots')}}">Doctor Time Slots</a></li>
                            <li><a href="{{url('table/view')}}">Table View</a></li>
                            <li><a href="{{url('doctor/chat')}}">Chat</a></li>
                            <li class="active"><a href="{{url('student/marks')}}">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Student Marks</div>
                        <div class="main_direct" id="student_subjects">                                  
                                <form name="student_subjects" method="post" action="{{url('student/marks/add')}}" role="form" class="inputs">
                                    <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success">{{session()->get('success')}}</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                    </div>    
                                    <div class="form-group">
                                        <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID">
                                    </div>
                                    <div class="form-group" name="subjects">
                                        <label>Subject</label>
                                        <select id="student_subjects_result" name="student_subject" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mark</label>
                                        <input type="number" name="mark" class="form-control" min="0">
                                    </div>
                                    <div class="form-group">
                                        <input id="show_student_subjects" type="button" value="Show Subjects" class="btn btn-primary">
                                        <button id="student_marks_add" class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <div class="footer col-xs-12 text-center">
                    this content is copy righted by the team
                </div>
            </div>
        </div>
        @endsection