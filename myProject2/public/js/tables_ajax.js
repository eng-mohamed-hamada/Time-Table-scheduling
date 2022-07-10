var _token = $('input[name="_token"]').val();
function doctor_table(doctor_id){
    $(document).ready(function(){
        $.ajax({
            url:"doctor/table",
            method:"POST",
            data:{"_token":_token,"doctor_id":doctor_id},
            success:function(responsetext){
                
                $("#thetables_outputs").html(responsetext);
            }
        });
    });
}

function depart_table(depart_id){
    $(document).ready(function(){
        $.ajax({
            url:"depart/table",
            method:"POST",
            data:{"_token":_token,"depart_id":depart_id},
            success:function(responsetext){
                $("#thetables_outputs").html(responsetext);
            }
        });
    });
}

function level_table(level_id){
    $(document).ready(function(){
        $.ajax({
            url:"level/table",
            method:"POST",
            data:{"_token":_token,"level_id":level_id},
            success:function(responsetext){
                $("#thetables_outputs").html(responsetext);
            }
        });
    });
}

function place_table(place_id){
    $(document).ready(function(){
        $.ajax({
            url:"place/table",
            method:"POST",
            data:{"_token":_token,"place_id":place_id},
            success:function(responsetext){
                $("#thetables_outputs").html(responsetext);
            }
        });
    });
}

function all_table(){
    $(document).ready(function(){
        $.ajax({
            url:"all/table",
            method:"POST",
            data:{"_token":_token},
            success:function(responsetext){
                $("#thetables_outputs").html(responsetext);
            }
        });
    });
}
$('#show_table').click(function(){
    var table_data=$("#table_data").val();
    switch(table_data){
        case "doctor":
            var doctor_id=prompt("Enter the doctor id?");
            doctor_table(doctor_id);
            break;
        case "department":
            var depart_id=prompt("Enter the depart id?");
            depart_table(depart_id);
            break;
        case "level":
            var level_id=prompt("Enter the level id?");
            level_table(level_id);
            break;
        case "place":
            var place_id=prompt("Enter the place id?");
            place_table(place_id);
            break;
        case "all":
            all_table();
            break;
    }
});
//this function isn't correct
function print_table(){
    "use strict";
    var thetable=$("#thetables_outputs table");
    if(thetable===""){
        alert("please show the table first");
    }else{
        window.print(thetable);
    }
}

$('#change_state').click(function(){
    "use strict";
    $(document).ready(function(){
        var thestate=$("#control_state").val();
        $.ajax({
            url:"control/state",
            method:"POST",
            data:{"_token":_token,"thestate":thestate},
            success:function(responsetext){
                alert(responsetext);
            }
        });
    });
});

$('#print').click(function(){
    "use strict";
    $(document).ready(function(){
        var printme = $('#thetables_outputs table');
        var wme = window.open("", "", "width=900, height=700");
        window.print(printme)
        //wme.close();  
    });
});
    
