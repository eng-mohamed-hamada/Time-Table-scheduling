@extends('layouts.app')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="{{ asset('images/'.Auth::user()->photo) }}" alt="image"></li>
                            <li>{{ Auth::user()->username }}</li>
                            <li><a  class="btn btn-primary" href="admin_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="{{url('terms')}}">Terms</a></li>
                            <li><a href="{{url('doctors')}}">Doctors</a></li>
                            <li><a href="{{url('subjects')}}">Subjects</a></li>
                            <li><a href="{{url('pre_requests')}}">Pre Requests</a></li>
                            <li><a href="{{url('levels')}}">Levels</a></li>
                            <li><a href="{{url('days')}}">Days</a></li>
                            <li><a href="{{url('degrees')}}">Degrees</a></li>
                            <li><a href="{{url('departments')}}">Departments</a></li>
                            <li><a href="{{url('department/subjects')}}">Department Subjects</a></li>
                            <li><a href="{{url('places')}}">Places</a></li>
                            <li class="active"><a href="{{url('timeslots')}}">Time Slots</a></li>
                            <li><a href="{{url('day/timeslots')}}">Day Time Slots</a></li>
                            <li><a href="{{url('students')}}">Students</a></li>
                            <li><a href="{{url('teach/methods')}}">Teach Method</a></li>
                            <li><a href="{{url('groups')}}">Groups</a></li>
                            <li><a href="{{url('level/groups')}}">Level Groups</a></li>
                            <li><a href="{{url('place/days')}}">Place Days</a></li>
                            <li><a href="{{url('place/day/timeslots')}}">Place Time Slots</a></li>
                            <li><a href="{{url('register/admin')}}">Create Admin</a></li>
                            <li><a href="{{url('create/tables')}}">Create tables</a></li>
                            <li><a href="{{url('tables')}}">Tables</a></li>
                            <li><a href="{{url('requests')}}">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Time Slots</div>
                        <div class="main_direct" id="time_slots">                                  
                                <form name="time_slots" method="post" action="{{ url('timeslots/add') }}" role="form" class="inputs">
                                        <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success">{{session()->get('success')}}</label>
                                        </div>
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                        </div>
                                        <div class="col-sm-6 form-group">
                                                <label>time from *</label>
                                                <input name="time_from" type="time" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                                <label>time to *</label>
                                                <input name="time_to" type="time" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <input type="submit" value="add" class="btn btn-primary">
                                        </div>
                                </form>
                                <div class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>id</td>
                                            <td>From</td>
                                            <td>To</td>
                                            <td>Hours</td>
                                            <td>Delete</td>
                                            <td>Edit</td>
                                        </tr>
                                        @foreach($timeslots as $timeslot)
                                        <tr>
                                            <td>{{ $timeslot->id }}</td>
                                            <td>{{  $timeslot->time_from  }}</td>
                                            <td>{{  $timeslot->time_to  }}</td>
                                            <td>{{  $timeslot->total_hours  }}</td>
                                            <td><a class="btn btn-danger" href="{{ url('timeslots/delete/'.$timeslot->id) }}">Delete</a></td>
                                            <td>Edit</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
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