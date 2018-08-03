
$(document).ready(function () {   




    var hasBailChecked = $("#field-has_bail-true").is(":checked")
    
    if($("#field-has_bail-true").is(":checked")){
        //ยื่น

        if($("#field-bail_status-true").is(":checked")){
            //อนุญาต
            $(".courttype_form_group").show(); 
            $(".bail_date_form_group").show(); 
            $(".bail_end_contract_form_group").show(); 
            $(".bailtype_form_group").show();  
            $(".bail_other_form_group").show();  
            $(".bail_price_form_group").show();

        }else{
            //ไม่อนุญาต
            $(".courttype_form_group").hide(); 
            $(".bail_date_form_group").hide();  
            $(".release_time_form_group").hide(); 
            $(".bail_end_contract_form_group").hide(); 
            $(".bailtype_form_group").hide();  
            $(".bail_other_form_group").hide();  
            $(".bail_price_form_group").hide();

        }


    }else{
        //ไม่ยื่น
        $(".bailmantype_form_group").hide(); 
        $(".bailmantype_other_form_group").hide();
        $(".bail_status_form_group").hide();   
        $(".release_time_form_group").hide(); 
        $(".courttype_form_group").hide(); 
        $(".bail_date_form_group").hide();
        $(".bail_end_contract_form_group").hide(); 
        $(".bailtype_form_group").hide();  
        $(".bail_other_form_group").hide();  
        $(".bail_price_form_group").hide(); 

    }


    //Check click
    $("input[name=has_bail]:radio").click(function() {
        //Check : ยื่น และ อนุญาติ
        if($(this).attr("value")=="1" && $("#field-bail_status-true").is(":checked")) {

            $(".bailmantype_form_group").show(400); 
            $(".bailmantype_other_form_group").show(400);
            $(".bail_status_form_group").show(400); 
            $(".release_time_form_group").show(400);

            $(".courttype_form_group").show(400); 
            $(".bail_date_form_group").show(400);
            $(".bail_end_contract_form_group").show(400); 
            $(".bailtype_form_group").show(400);  
            $(".bail_other_form_group").show(400);  
            $(".bail_price_form_group").show(400); 

        }else if($(this).attr("value") == "1") {

            //Check : ยื่น และ ไม่อนุญาติ
            $(".bailmantype_form_group").show(400); 
            $(".bailmantype_other_form_group").show(400);
            $(".bail_status_form_group").show(400); 
            $(".release_time_form_group").show(400);

            
            //Check : ยื่น และ คลิกอนุญาติ
            $("input[name=bail_status]:radio").click(function() {
                if($(this).attr("value")=="1") {
            
                    $(".courttype_form_group").show(400); 
                    $(".bail_date_form_group").show(400);
                    $(".bail_end_contract_form_group").show(400); 
                    $(".bailtype_form_group").show(400);  
                    $(".bail_other_form_group").show(400);  
                    $(".bail_price_form_group").show(400); 
                }else if($(this).attr("value")=="0"){
                    $(".courttype_form_group").hide(400); 
                    $(".bail_date_form_group").hide(400);
                    $(".bail_end_contract_form_group").hide(400); 
                    $(".bailtype_form_group").hide(400);  
                    $(".bail_other_form_group").hide(400);  
                    $(".bail_price_form_group").hide(400);
                }
            });
        //Check : ไม่อนุญาต
        }else if($(this).attr("value")=="0") {
            $(".bailmantype_form_group").hide(400); 
            $(".bailmantype_other_form_group").hide(400);
            $(".bail_status_form_group").hide(400); 
            $(".release_time_form_group").hide(400);
            $(".courttype_form_group").hide(400); 
            $(".bail_date_form_group").hide(400);
            $(".bail_end_contract_form_group").hide(400); 
            $(".bailtype_form_group").hide(400);  
            $(".bail_other_form_group").hide(400);  
            $(".bail_price_form_group").hide(400); 
        }
    });



    //Check : ยื่น และ คลิกอนุญาติ
    $("input[name=bail_status]:radio").click(function() {
        if($(this).attr("value")=="1") {
    
            $(".courttype_form_group").show(400); 
            $(".bail_date_form_group").show(400);
            $(".bail_end_contract_form_group").show(400); 
            $(".bailtype_form_group").show(400);  
            $(".bail_other_form_group").show(400);  
            $(".bail_price_form_group").show(400); 
        }else if($(this).attr("value")=="0"){
            $(".courttype_form_group").hide(400); 
            $(".bail_date_form_group").hide(400);
            $(".bail_end_contract_form_group").hide(400); 
            $(".bailtype_form_group").hide(400);  
            $(".bail_other_form_group").hide(400);  
            $(".bail_price_form_group").hide(400);
        }
    });

})
//field-has_bail-false