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
                            <li class="active"><a href="{{url('doctors')}}">Doctors</a></li>
                            <li><a href="{{url('subjects')}}"><i class="fa fa-book"></i> Subjects</a></li>
                            <li><a href="{{url('pre_requests')}}">Pre Requests</a></li>
                            <li><a href="{{url('levels')}}">Levels</a></li>
                            <li><a href="{{url('days')}}"><i class="fa fa-calendar"></i> Days</a></li>
                            <li><a href="{{url('degrees')}}">Degrees</a></li>
                            <li><a href="{{url('departments')}}">Departments</a></li>
                            <li><a href="{{url('department/subjects')}}">Department Subjects</a></li>
                            <li><a href="{{url('places')}}"><i class="fa fa-home"></i> Places</a></li>
                            <li><a href="{{url('timeslots')}}"><i class="fa fa-clock-o"></i> Time Slots</a></li>
                            <li><a href="{{url('day/timeslots')}}">Day Time Slots</a></li>
                            <li><a href="{{url('students')}}"><i class="fa fa-users"></i> Students</a></li>
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
                        <div class="active col-xs-12 text-left">Doctors</div>
                        <div class="main_direct" id="doctors">
                            
                                <form id="doctors" method="post" action="{{url('doctors/add')}}" role="form" class="inputs">
                                        <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success">{{session()->get('success')}}</label>
                                        </div>
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                        </div>
                                        <div class="col-sm-6 col-md-4 form-group">
                                            <label>id *</label>
                                            <input name="id" placeholder="Id" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6 col-md-4 form-group">
                                            <label>name *</label>
                                            <input name="name" placeholder="Name" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6 col-md-4 form-group">
                                            <label>department *</label>
                                            <select name="depart" class="form-control">
                                                <option selected disabled>Select the Department</option>
                                                @foreach($departments as $depart)
                                                <option value="{{$depart->id}}">{{$depart->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-md-12 form-group">
                                            <label>degree *</label>
                                            <select name="degree" class="form-control">
                                                <option selected disabled>Select the Degree</option>
                                                @foreach($degrees as $degree)
                                                <option value="{{$degree->id}}">{{$degree->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add" class="btn btn-primary">
                                        </div>
                                </form>
                                <div id="doctors_outputs" class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>id</td>
                                            <td>Name</td>
                                            <td>Depart</td>
                                            <td>Degree</td>
                                            <td>Delete</td>
                                            <td>Edit</td>
                                        </tr>
                                        @foreach($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->id }}</td>
                                            <td>{{  $doctor->name  }}</td>
                                            <td>{{  $doctor->depart_id  }}</td>
                                            <td>{{  $doctor->degree_id  }}</td>
                                            <td><a class="btn btn-danger" href="{{ url('doctors/delete/'.$doctor->id) }}">Delete</a></td>
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