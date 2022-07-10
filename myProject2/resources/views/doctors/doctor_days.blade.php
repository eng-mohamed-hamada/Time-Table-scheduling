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
                            <li><a class="btn btn-primary" href="doctor_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="{{url('doctor/subjects')}}">Doctor Subjects</a></li>
                            <li class="active"><a href="{{url('doctor/days')}}">Doctor Days</a></li>
                            <li><a href="{{url('doctor/day/timeslots')}}">Doctor Time Slots</a></li>
                            <li><a href="{{url('table/view')}}">Table View</a></li>
                            <li><a href="{{url('doctor/chat')}}">Chat</a></li>
                            <li><a href="{{url('student/marks')}}">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Doctor Days</div>
                        <div class="main_direct" id="doctor_days">                                   
                                <form name="doctor_days" method="post" action="{{url('doctor/days/add')}}" role="form" class="inputs">
                                <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success">{{session()->get('success')}}</label>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                    </div>
                                    <div id="days" >
                                    <div class="form-group">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input id="checkAll" type="checkbox"> <span class="label-text">All</span>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach($days as $day)
                                        <div class="form-group">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="{{$day->id}}"> <span class="label-text">{{$day->name}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
                                    </div>
                                </form>
                                <div class="outputs">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="footer col-xs-12 text-center">
                    this content is copy righted by the team
                </div>
            </div>
        </div>
        @endsection