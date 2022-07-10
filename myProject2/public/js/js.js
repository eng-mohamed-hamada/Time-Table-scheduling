
$(document).ready(function(){
    //this functions used in students view to get the groups for specific level
    $('#students_levels').change(function(){
        var level = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'students/get_groups',
            method:'post',
            data:{'_token':_token,'level':level},
            success:function(responsetext){
                $('#students_groups').html(responsetext);
            }
        });
    });
    //this functions used in place_day_timeslots view to get the place time slots according to place days
    $('#place_day_timeslots_places').change(function(){
        var place = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'/place/day/timeslots/get_place_time_slots',
            method:'post',
            data:{'_token':_token,'place':place},
            success:function(responsetext){
                $('#place_day_timeslots_time_slots').html(responsetext);
            }
        });
    });
    ////////////////////////end//////////////////////////
    //add doctor subjects
    $('#doctor_subjects_subjects').click(function(){
        $.ajax({
            url:'/doctor/subjects/add',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                alert(responsetext);
            },complete: function(responsetext){
                $('#doctor_subjects_teach_method').load('/doctor/subjects/teach_methods');
            }
        });
    });
    ////////////////////////end//////////////////////////
     //add doctor subjects teach methods
     $('#doctor_subjects_teach_methods').click(function(){
        $.ajax({
            url:'/doctor/subjects/teach_methods/add',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                alert(responsetext);
            },complete: function(responsetext){
                $('#doctor_subjects_devision_type').load('/doctor/subjects/devision_types');
            }
        });
    });
    ////////////////////////end//////////////////////////
    //add doctor subjects devision_types
    $('#doctor_subjects_devision_types').click(function(){
        $.ajax({
            url:'/doctor/subjects/devision_types/add',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                alert(responsetext);
            }
        });
    });
    ////////////////////////end//////////////////////////
    //show doctor day timeslots
    $('#doctor_time_slots_show').click(function(){
        $.ajax({
            url:'/doctor/day/timeslots/show',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                $('#doctor_time_slots_time_slots').html(responsetext);
            }
        });
    });
    ////////////////////////end//////////////////////////
    //the count of timeslots should be choose
    $('#doctor_time_slots_doctor_subjects').change(function(){
        $.ajax({
            url:'/doctor/day/timeslots/get_timeslots_count',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                $('#time_slots_number').val(responsetext);
            }
        });
    });
    ////////////////////////end//////////////////////////
    //add doctor day timeslots
    
    $('#doctor_time_slots_add').click(function(){
        var doctor_subject_id=$("#doctor_time_slots_doctor_subjects").val();
            doctor_subject_id=doctor_subject_id.split("&");
            doctor_subject_id=doctor_subject_id[0];
            var subject_code=doctor_subject_id[1];
            var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "timeslots/doctor_subjects_count",
            method: "POST",
            async:"false",
            data:{'_token':_token},
            complete: function (responsetext) {
                if(responsetext == null || responsetext == ""){
                    alert("please register your subjects first.");
                }else{
                    
                    var time_slots_number=$("#time_slots_number").val();
                    if(time_slots_number !=="1"){
                        var thelevel_groups=$("select[name='thegroups[]']");
                    }
                    var theckecked=$("[name='chk']:checked").length;
                    
                    if(theckecked==0){
                        alert("please check the time slots");
                    }else if(theckecked < time_slots_number){
                        alert("check another time");
                    }else if(theckecked > time_slots_number){
                        alert("unckeck one time");
                    }else{
                        // add doctor time slot
                        var day_time_slots_id=$("[name='chk']");
                        var theplaces = $("select[name='theplaces[]']");
                        var day_id=[];
                        var time_slot_id=[];
                        var level_group_id=[];
                        var places=[];
                        var day_time_slots=[];
                        var row_id=[];
                        var counter=0;
                        for(var i=0;i<day_time_slots_id.length;i++){
                            if(day_time_slots_id[i].checked===true){
                                if(time_slots_number ==="1"){
                                    level_group_id[counter]="";
                                }else{
                                    level_group_id[counter]=thelevel_groups[i].value;
                                }
                                var theids=$("select[name='theplaces[]']").eq(i).parent().parent().attr("id");
                                theids=theids.split("&");
                                row_id[counter]=theids[0];
                                day_id[counter]=theids[1];
                                time_slot_id[counter]=theids[2];
                                places[counter]=theplaces[i].value;
                                day_time_slots[counter]=day_time_slots_id[i].value;
                                counter++;
                            }
                        }
                        if(counter !==0){
                            $.ajax({
                                url:"timeslots/add",
                                method:"POST",
                                data:{'_token':_token,"row_id":row_id,"day_time_slots_id":day_time_slots,"doctor_subject_id":doctor_subject_id,"place_id":places,"level_group_id":level_group_id,"day_id":day_id,"time_slot_id":time_slot_id,"subject_code":subject_code},
                                success:function(responsetext){
                                    if(responsetext=="doctor time slot added."){
                                        $("#doctor_time_slots_time_slots").html("");
                                    }
                                    alert(responsetext);
                                }
                            });
                        }
                        
                    }
                }
            }
        });
    });
    ////////////////////////end//////////////////////////
    //get student subjects
    $('#show_student_subjects').click(function(){
        var show_button = $('#show_student_subjects');
        $.ajax({
            url:'/student/subjects/check/exits',
            method:'post',
            data:$(this).parent().parent().serialize(),
            success:function(responsetext){
                if(responsetext == "0"){
                    alert("there are no student with this ID");
                }else{
                    $.ajax({
                        url:'/student/subjects/get/subjects',
                        method:'post',
                        data:show_button.parent().parent().serialize(),
                        success:function(responsetext){
                            $('#student_subjects_result').html(responsetext);
                        }
                    });
                }
            }
        });
    });
});
////////////////////////end//////////////////////////
    //show academic registty
    $('#show_academic_registry').click(function(){
        $.ajax({
            url:'/student/academic/registry',
            method:'get',
            success:function(responsetext){
                $('#student_academic_registry').html(responsetext);
            }
        });
    });
////////////////////////end//////////////////////////


////////////////////////end//////////////////////////
    //print academic registry
    $('#print_academic_registry').click(function(){
        //Get the HTML of div
        var divElements = $('#student_academic_registry').html();
        //Get the HTML of whole page
        var oldPage = $('body').html();
        //Reset the page's HTML with div's HTML only
        $('body').html(divElements);
        //Print Page
        window.print();
        //Restore orignal HTML
        $('body').html(oldPage);
    });
////////////////////////end//////////////////////////

$(document).ready(function(){
    $("#checkAll").on("change",function(){
        $("input:checkbox").prop("checked",$(this).prop("checked"));
    });
});