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
                            <li><a class="btn btn-primary" href="admin_settings.php">Settings</a></li>
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
                            <li><a href="{{url('timeslots')}}">Time Slots</a></li>
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
                            <li class="active"><a href="{{url('requests')}}">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">The Requests</div>
                        <div class="main_direct" id="degrees">                                 
                            <form name="degrees" method="post" action="{{url('degrees/add')}}" role="form" class="inputs">
                                <div class="form-group">
                                    <br>
                                    <br>

                                    <label class="form-control btn-success">{{session()->get('success')}}</label>
                                </div>
                                <div class="form-group">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    @foreach($requests as $the_request)
                                        <div class="alert alert-success">
                                            <strong>Mohamed Hamada Faheem ({{$the_request->student_id}})</strong>
                                            <br>
                                            <span>{{$the_request->created_at}}</span>
                                            <br>
                                            <label>Required Hours:</label><span> {{$the_request->required_hours}}</span>
                                            <p class="lead">{{$the_request->resson}}</p>
                                            <div class="text-right">
                                                <a class="btn btn-primary" href="requests/update/{{$the_request->id}}/accepted"><i class="fa fa-check"></i> Accepted</a>
                                                <a class="btn btn-danger" href="requests/update/{{$the_request->id}}/rejected"><i class="fa fa-trash"></i> Rejected</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    
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