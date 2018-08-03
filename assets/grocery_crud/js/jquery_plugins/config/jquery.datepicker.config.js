// $(function(){
// 	$('.datepicker-input').datepicker({
// 			dateFormat: js_date_format,
// 			showButtonPanel: true,
// 			changeMonth: true,
// 			changeYear: true
// 	});
	
// 	$('.datepicker-input-clear').button();
	
// 	$('.datepicker-input-clear').click(function(){
// 		$(this).parent().find('.datepicker-input').val("");
// 		return false;
// 	});
	
// });


$.datepicker.regional['th'] ={
	changeMonth: true,
	changeYear: true,
	//defaultDate: GetFxupdateDate(FxRateDateAndUpdate.d[0].Day),
	yearOffSet: 543,
	//showOn: "button",
	//buttonImage: 'images/calendar.gif',
	//buttonImageOnly: true,
	showButtonPanel: true,
	dateFormat: 'dd M yy',
	dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
	dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
	monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
	monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
	constrainInput: true,
	yearRange: '-10:+0',
	//buttonText: 'เลือก',
  
};
$.datepicker.setDefaults($.datepicker.regional['th']);

$(function() {
	$('.datepicker-input').datepicker( $.datepicker.regional["th"] ); // Set ภาษาที่เรานิยามไว้ด้านบน
	//$('.datepicker-input').datepicker("setDate", new Date()); //Set ค่าวันปัจจุบัน


		
	$('.datepicker-input-clear').button();
	
	$('.datepicker-input-clear').click(function(){
		$(this).parent().find('.datepicker-input').val("");
		return false;
	});


});