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
                            <li><a href="{{url('doctor/days')}}">Doctor Days</a></li>
                            <li class="active"><a href="{{url('doctor/day/timeslots')}}">Doctor Time Slots</a></li>
                            <li><a href="{{url('table/view')}}">Table View</a></li>
                            <li><a href="{{url('doctor/chat')}}">Chat</a></li>
                            <li><a href="{{url('student/marks')}}">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Doctor Time Slots</div>
                        <div class="main_direct" id="doctor_time_slots">
                            
                        </div>
                        <div class="main_direct" id="doctor_subjects">
                            <form name="doctor_time_slots" role="form" class="inputs">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                </div>
                                <div class="form-group">
                                    <label>subject *</label>
                                    <select name="doctor_subjects" id="doctor_time_slots_doctor_subjects" class="form-control">
                                        <option disabled selected>Choose the subject</option>
                                        @foreach($thesubjects as $subject)
                                        <option value="{{$subject->id.'&'.$subject->code}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>count of Times *</label>
                                    <input id="time_slots_number" name="time_slots_number" type="hidden" value="1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="button" id="doctor_time_slots_add" value="add" class="btn btn-primary">
                                    <input type="button" id="doctor_time_slots_show" value="Show Avialable Time Slots" class="btn btn-primary">
                                </div>
                                <div id="doctor_time_slots_time_slots" class="outputs">
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