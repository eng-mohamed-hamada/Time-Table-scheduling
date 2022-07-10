function get_notifications(){
    $(document).ready(function(){
        $.ajax({
            url:'php/notifications.php',
            method:"POST",
            data:{"function_name":"get_notifications"},
            success:function(responsetext){
                $("#notifications").html(responsetext);
            }
        });
    });
}
function add_notifications(senderName, problem_location, count, type){
    "use stricts";
    $(document).ready(function(){
        var hours=new Date().getHours();
        var minuts=new Date().getMinutes();
        var seconds=new Date().getSeconds();
        if(hours>12){
            hours=hours-12;
        }
        var time=(hours+":"+minuts+":"+seconds).toString();
        var day=new Date().getDate();
        var month=new Date().getMonth()+1;
        var year=new Date().getFullYear();
        var date=year+"-"+month+"-"+day;
        var message="";
        if(type=="execption"){
            message="there are "+count+" time slots with doctor "+senderName+" has a problem in the "+problem_location;
        }else{
            message="doctor: "+senderName+" has negative comment on "+problem_location;
        }
        $.ajax({
            url:'php/notifications.php',
            method:"POST",
            data:{"function_name":"add_notifications","sender":senderName,"time":time,"date":date,"message":message}
        });
    });
}
get_notifications();
setInterval(get_notifications,300000);