
    $(document).ready(function () {   



        var hasSelected = $('#field-case_tranfer_type').val()

        
        // alert(hasCheck.is(':checked') +" : "+hasCheck.attr("value"))
        if ($("#field-has_case_tranfer-true").is(":checked")) {
            //มี
            if(hasSelected == 1){
                //มาตรา 26
                $(".case_tranfer_type_form_group").show(400);               
                $(".case_tranfer_court_form_group").show(400); 
                $(".case_tranfer_rednum_form_group").show(400); 
                $(".case_tranfer_date_form_group").show(400);  
                $(".case_tranfer_read_date_form_group").show(400); 
                $(".case_tranfer_command_form_group").hide();  
                $(".case_tranfer_by_form_group").hide();  
                $(".case_tranfer_remark_form_group").hide();  
                // $('#field-case_tranfer_remark').val("")
                // $('#field-case_tranfer_by').val("")
                // $('#field-case_tranfer_command-true').attr( 'checked', false )
                // $('#field-case_tranfer_command-false').attr( 'checked', true )
                //.setAttribute("checked", "checked");
            }else if(hasSelected == 2){
                //มี & มาตรา 26
                $(".case_tranfer_type_form_group").show(400);               
                $(".case_tranfer_court_form_group").show(400); 
                $(".case_tranfer_rednum_form_group").show(400); 
                $(".case_tranfer_date_form_group").show(400);  
                $(".case_tranfer_read_date_form_group").show(400); 
                $(".case_tranfer_command_form_group").show(400);  
                $(".case_tranfer_by_form_group").show(400);  
                $(".case_tranfer_remark_form_group").show(400); 
                 
                //$('#field-case_tranfer_by').val("0")
            }
        }else if ($("#field-has_case_tranfer-false").is(":checked")) {
            //ไม่มีการรับโอน
            $(".case_tranfer_type_form_group").hide(); 
            $(".case_tranfer_court_form_group").hide(); 
            $(".case_tranfer_rednum_form_group").hide(); 
            $(".case_tranfer_date_form_group").hide();  
            $(".case_tranfer_read_date_form_group").hide(); 
            $(".case_tranfer_command_form_group").hide();  
            $(".case_tranfer_by_form_group").hide();  
            $(".case_tranfer_remark_form_group").hide();  
        }


      

        $("input[name=has_case_tranfer]:radio").click(function() {
            if($(this).attr("value")=="1") {
                $(".case_tranfer_type_form_group").show(400);               
                $(".case_tranfer_court_form_group").show(400); 
                $(".case_tranfer_rednum_form_group").show(400); 
                $(".case_tranfer_date_form_group").show(400);  
                $(".case_tranfer_read_date_form_group").show(400); 
                //$(".case_tranfer_command_form_group").show(1000);  
                //$(".case_tranfer_by_form_group").show(1000);  
                //$(".case_tranfer_remark_form_group").show(1000); 
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