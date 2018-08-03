$(document).ready(function () {   

    $(".case_tranfer_type_form_group").hide(); 
    $(".case_tranfer_court_form_group").hide(); 
    $(".case_tranfer_rednum_form_group").hide(); 
    $(".case_tranfer_date_form_group").hide();  
    $(".case_tranfer_read_date_form_group").hide(); 
    $(".case_tranfer_command_form_group").hide();  
    $(".case_tranfer_by_form_group").hide();  
    $(".case_tranfer_remark_form_group").hide();  

    $("input[name=has_case_tranfer]:radio").click(function() {
        if($(this).attr("value")=="1") {
            $(".case_tranfer_type_form_group").show(400);               
            $(".case_tranfer_court_form_group").show(400); 
            $(".case_tranfer_rednum_form_group").show(400); 
            $(".case_tranfer_date_form_group").show(400);  
            $(".case_tranfer_read_date_form_group").show(400); 
        }
        if($(this).attr("value")=="0") {

            $(".case_tranfer_type_form_group").hide(400); 
            $(".case_tranfer_court_form_group").hide(400); 
            $(".case_tranfer_rednum_form_group").hide(400); 
            $(".case_tranfer_date_form_group").hide(400);  
            $(".case_tranfer_read_date_form_group").hide(400); 
            $(".case_tranfer_command_form_group").hide(400);  
            $(".case_tranfer_by_form_group").hide(400);  
            $(".case_tranfer_remark_form_group").hide(400); 
        }
    });


    $('#field-case_tranfer_type').change(function(){
        var selected = $('#field-case_tranfer_type').val()
        //alert(selected)
        if(selected == 1){
            $(".case_tranfer_command_form_group").hide(400);  
            $(".case_tranfer_by_form_group").hide(400);  
            $(".case_tranfer_remark_form_group").hide(400); 
        }else if(selected == 2){

            $(".case_tranfer_command_form_group").show(400);  
            $(".case_tranfer_by_form_group").show(400);  
            $(".case_tranfer_remark_form_group").show(400); 
        }
    });

});  
