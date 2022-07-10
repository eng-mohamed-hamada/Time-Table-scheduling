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
                            <li class="active"><a href="{{url('student/academic/registry/view')}}">Academic Registry</a></li>
                            <li><a href="{{url('student/requests')}}">My Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Academic Registery</div>
                        <div class="Academic_Registry main_direct" id="student_subjects">  
                            <div name="public_data" class="form-group">
                                <h3>جامعة بنى سويف</h3>
                                <h3>كلية الحاسبات والمعلومات</h3>
                                <h3>قسم: {{$depart_name}}</h3>
                            </div>                                
                            <div id="student_academic_registry" class="form-group">
                                
                                
                            </div>
                            <div class="form-group">
                                <button id="show_academic_registry" class="btn btn-primary"><i class="fa fa-send"></i> Show academic registry</button>
                                <button id="print_academic_registry" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
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