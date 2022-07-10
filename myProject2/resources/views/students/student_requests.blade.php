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
                            <li><a href="{{url('student/subjects')}}">Student Subjects</a></li>
                            <li><a href="{{url('student/academic/registry/view')}}">Academic Registry</a></li>
                            <li class="active"><a href="{{url('student/requests')}}">My Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Student Requests</div>
                        <div class="main_direct" id="student_subjects">                                  
                                <form name="student_subjects" method="post" action="{{url('student/requests/add')}}" role="form" class="inputs">
                                <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success">{{session()->get('success')}}</label>
                                        </div>
                                        <div class="form-group">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>hours you want</label>
                                            <input name="required_hours" class="form-control" type="number">
                                        </div>
                                        <div class="form-group">
                                            <label>reson</label>
                                            <textarea name="resson" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                                        </div>
                                </form>
                                <div class="outputs">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center text-center">
                                            <tr>
                                                <td>id</td>
                                                <td>Required Hours</td>
                                                <td>Resson</td>
                                                <td>Status</td>
                                                <td>Delete</td>
                                            </tr>
                                            @foreach($requests as $request)
                                            <tr>
                                                <td>{{ $request->id }}</td>
                                                <td>{{  $request->required_hours  }}</td>
                                                <td>{{  $request->resson  }}</td>
                                                <td>{{  $request->status  }}</td>
                                                <td><a class="btn btn-danger" href="{{ url('student/requests/delete/'.$request->id) }}">Delete</a></td>
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