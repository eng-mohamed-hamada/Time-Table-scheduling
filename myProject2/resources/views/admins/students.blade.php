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
                            <li class="active"><a href="{{url('students')}}">Students</a></li>
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
                        <div class="active col-xs-12 text-left">Students</div>
                        <div class="main_direct" id="students">                                   
                                <form name="students" method="post" action="{{ url('students/add') }}" role="form" class="inputs">
                                        <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success">{{session()->get('success')}}</label>
                                        </div>
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                        </div>
                                        <div class="form-group">
                                                <label>id *</label>
                                                <input name="id" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label>name *</label>
                                                <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label>level id *</label>
                                                <select id="students_levels" name="level_id" class="form-control">
                                                    <option selected disabled>Choose The Level</option>
                                                    @foreach($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>department id *</label>
                                            <select name="depart_id" class="form-control">
                                                <option selected disabled>Choose The Department</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>group id *</label>
                                            <select id="students_groups" name="level_group_id" class="form-control">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <input type="submit" value="Add" class="btn btn-primary">
                                        </div>
                                </form>
                                <div id="students_outputs" class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>id</td>
                                            <td>name</td>
                                            <td>level</td>
                                            <td>depart</td>
                                            <td>group</td>
                                            <td>Delete</td>
                                            <td>Edit</td>
                                        </tr>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{  $student->name  }}</td>
                                            <td>{{  $student->level_id  }}</td>
                                            <td>{{  $student->depart_id  }}</td>
                                            <td>{{  $student->level_group_id  }}</td>
                                            <td><a class="btn btn-danger" href="{{ url('students/delete/'.$student->id) }}">Delete</a></td>
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