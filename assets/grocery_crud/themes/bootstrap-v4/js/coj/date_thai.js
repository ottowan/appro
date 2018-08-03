$(document).ready(function () {   


    //Beforeimprison : convert date
    if($('#field-arrest_date').val())
        $('#field-arrest_date').val(convertThaiYear($('#field-arrest_date').val()))

    
    if($('#field-imprisoned_start_date').val())
        $('#field-imprisoned_start_date').val(convertThaiYear($('#field-imprisoned_start_date').val()))

    
    if($('#field-imprisoned_end_date').val())
        $('#field-imprisoned_end_date').val(convertThaiYear($('#field-imprisoned_end_date').val()))

    //Case : convert date
    if($('#field-recieve_date').val())
        $('#field-recieve_date').val(convertThaiYear($('#field-recieve_date').val()))

    if($('#field-judgement_date').val())
        $('#field-judgement_date').val(convertThaiYear($('#field-judgement_date').val()))


    //JudgementAppoint
    if($('#field-appoint_date').val())
        $('#field-appoint_date').val(convertThaiYear($('#field-appoint_date').val()))

    //release
    if($('#field-warrant_detention_date').val())
        $('#field-warrant_detention_date').val(convertThaiYear($('#field-warrant_detention_date').val()))

    if($('#field-warrant_release_date').val())
        $('#field-warrant_release_date').val(convertThaiYear($('#field-warrant_release_date').val()))

        
    if($('#field-warrant_imprison_between_date').val())
        $('#field-warrant_imprison_between_date').val(convertThaiYear($('#field-warrant_imprison_between_date').val()))

    
    if($('#field-warrant_imprison_date').val())
        $('#field-warrant_imprison_date').val(convertThaiYear($('#field-warrant_imprison_date').val()))

    //judgement
    if($('#field-first_judgement_date').val())
        $('#field-first_judgement_date').val(convertThaiYear($('#field-first_judgement_date').val()))



})


function convertThaiYear(date){
    var date_convert = ""
    if(date !== ""){
        date_convert = date.split("/")
        date_convert =  date_convert[0]+"/"+date_convert[1]+"/"+ (parseInt(date_convert[2])+543)
    }

    return date_convert

}