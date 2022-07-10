$(document).ready(function(){
    $(".thenav").click(function(){
        $(".sidebar").height($(window).height());
        $(".sidebar").animate({
            width:"toggle"
        },200,function(){
            if($(".sidebar").css("display")=="none"){
                $(".thenav").attr("class","thenav fa fa-caret-right");
            }
            else{
                $(".thenav").attr("class","thenav fa fa-caret-left");
            }
        });
    });
    
    $(document).on("scroll", function(){
        var scrollButton=$("#scroll-top");
        if($(this).scrollTop()>=500){
            scrollButton.show();
        }else{
            scrollButton.hide();
        }
        
    });
    $("#scroll-top").click(function(){
        $("html").animate({scrollTop:0},600);
    });
});


