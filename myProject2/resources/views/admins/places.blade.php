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
                            <li class="active"><a href="{{url('places')}}">Places</a></li>
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
                            <li><a href="{{url('requests')}}">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Places</div>
                        <div class="main_direct" id="places">    
                                <form name="places" method="post" action="{{url('places/add')}}" role="form" class="inputs">
                                        <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success">{{session()->get('success')}}</label>
                                        </div>
                                        <div class="form-group">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                                <label>name *</label>
                                                <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                                <label>capacity *</label>
                                                <input name="capacity" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <input type="submit" value="Add" class="btn btn-primary">
                                        </div>
                                </form>
                                <div id="places_outputs" class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>id</td>
                                            <td>Name</td>
                                            <td>Capacity</td>
                                            <td>Delete</td>
                                            <td>Edit</td>
                                        </tr>
                                        @foreach($places as $place)
                                        <tr>
                                            <td>{{ $place->id }}</td>
                                            <td>{{  $place->name  }}</td>
                                            <td>{{  $place->capacity  }}</td>
                                            <td><a class="btn btn-danger" href="{{ url('places/delete/'.$place->id) }}">Delete</a></td>
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