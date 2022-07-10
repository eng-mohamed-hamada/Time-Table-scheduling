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
                            <li><a  class="btn btn-primary" href="admin_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="{{url('terms')}}">Terms</a></li>
                            <li><a href="{{url('doctors')}}">Doctors</a></li>
                            <li class="active"><a href="{{url('subjects')}}">Subjects</a></li>
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
                            <li><a href="{{url('requests')}}">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Subjects</div>
                        <div class="main_direct" id="subjects">          
                                <form name="subjects" method="post" action="{{url('subjects/add')}}" role="form" class="inputs">
                                    <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success">{{session()->get('success')}}</label>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                    </div>        
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                            <label>code *</label>
                                            <input name="code" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                            <label>name *</label>
                                            <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                            <label>level id *</label>
                                            <select name="level_id" class="form-control">
                                                @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                        <label>houres *</label>
                                        <input name="hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                        <label>lecture hours *</label>
                                        <input name="lecture_hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 form-group">
                                        <label>section hours *</label>
                                        <input name="section_hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 form-group">
                                        <label>Full Mark *</label>
                                        <input name="full_mark" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 form-group">
                                        <label>Success Mark *</label>
                                        <input name="success_mark" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
                                    </div>
                                </form>
                                <div id="subjects_outputs" class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Level ID</td>
                                            <td>Hours</td>
                                            <td>Total Hours</td>
                                            <td>Groups Hours</td>
                                            <td>Delete</td>
                                            <td>Edite</td>
                                        </tr>
                                        @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->code }}</td>
                                            <td>{{  $subject->name  }}</td>
                                            <td>{{  $subject->level_id  }}</td>
                                            <td>{{  $subject->hours  }}</td>
                                            <td>{{  $subject->total_hours  }}</td>
                                            <td>{{  $subject->groups_hours  }}</td>
                                            <td><a class="btn btn-danger" href="{{ url('subjects/delete/'.$subject->code) }}">Delete</a></td>
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