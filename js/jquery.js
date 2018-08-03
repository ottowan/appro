$(document).ready(function(){
	$.isBlank = function(obj){
		return(!obj || $.trim(obj) === "");
	};
	//initial
	$("#loading").hide();
	$("#word2").hide();
	$("#word3").hide();
	$.isBlank = function(obj){
		return(!obj || $.trim(obj) === "");
	};
	var spinner = $( "#page" ).spinner();
	spinner.spinner( "disable" );
	
	$( "#tabs" ).tabs();
	$( "#case" ).accordion({
		heightStyle: "content",
		active:2
	});
	var pcode = "p0";
	var office = {};
	$("#dt1").mask("99/99/9999",{placeholder:"__/__/____"});
	//alert(pcode);
	$.post(baseurl+"/decision/office",{"p":"p13"}, function(data, status){
		//alert(status);
			$("#TextBox2").find('option').remove().end()
			$("#testbox").text(data);//console
			
			$.each(jQuery.parseJSON(data), function(i, row) {
				var selection = ""
				if(row=="ศาลแพ่ง"){selection = " selected "
					$("#TextBox2").append('<option value='+row+selection+'>'+row+'</option>');//ส่งค่าตอนคลิกที่ลิส
				}
			});
	});
	$("#partnumber").change(function(){
		pcode = this.value;
		$.post(baseurl+"/decision/office",
			{"p":pcode
			 }, function(data, status){
			$("#TextBox2").find('option').remove().end()
			$("#testbox").text(data);//console
			//$("#TextBox2").append('<option value=""></option>');
			$.each(jQuery.parseJSON(data), function(i, row) {
				$("#TextBox2").append('<option value="'+row+'">'+row+'</option>');//ส่งค่าตอนคลิกที่ลิส
			});
		});
	});


	
	$("#reset_but").click(function(){
		w3_close();
	});
    $("#search_but").click(function(){
		$("#loading").show();
		var partnumber = $("#partnumber").val();
		var TextBox2 = $("#TextBox2").val();
		var black = $("#TextBox3").val();
		var red = $("#rdd").val();
		var typedecision = $("#typedecision").val();
		var TextBox4 = $("#TextBox4").val();

		//alert("search.php?r="+encodeURIComponent(red)+"&b="+encodeURIComponent(black)+"&ComboBox2="+encodeURIComponent(ComboBox2)+"&partnumber="+encodeURIComponent(partnumber)+"&TextBox4="+encodeURIComponent(TextBox4)+"&TextBox5="+encodeURIComponent(TextBox5)+"&dt1="+encodeURIComponent(dt1)+"&TextBox6="+encodeURIComponent(TextBox6)+"&TextBox9="+encodeURIComponent(TextBox9)+"&TextBox11="+encodeURIComponent(TextBox11)+"&TextBox2="+encodeURIComponent(TextBox2));
		//if($.isBlank(red)&&$.isBlank(black)&&$.isBlank(TextBox4)&&$.isBlank(TextBox5)&&$.isBlank(dt1)&&$.isBlank(TextBox6)&&$.isBlank(TextBox9)&&$.isBlank(TextBox11)&&$.isBlank(jj)&&$.isBlank(jl)&&$.isBlank(typedecision)){
		//alert("โปรดกรอกคำค้นหาอย่างน้อย 1 รายการ");
		//return(false);
		//}
		var record = 0;
		var search_data = {"r":red,
			 "b":black,
			 "partnumber":partnumber,
			 "TextBox4":TextBox4,
			 "TextBox2":TextBox2,
			 "typedecision":typedecision
			 };
		//$("#testbox").text(search_data+'123');
		console.log(search_data);
		$.post(baseurl+"/decision/search0",search_data, function(data, status){
			$("#list-bar").find('option').remove().end()
			//$("#testbox").text(data);//console
			console.log(data);
			$("#record").text(data);
			record = data;
			var total = Math.ceil(record/1000);
			$("#tpage").text('รวม '+total+' หน้า');
			//$("#testbox").text(record+'รวม '+total+' หน้า');
			spinner.spinner( "enable" );
			spinner.spinner({
				max: total,
				min: 1,
			});
			spinner.spinner( "value", 1 );
		$.post(baseurl+"/decision/search",
			{"r":red,
			"b":black,
			"partnumber":partnumber,
			"TextBox4":TextBox4,
			"TextBox2":TextBox2,
			"typedecision":typedecision,
			 "page":1
			 }, function(data, status){
				console.log(data);
			$("#list-bar").find('option').remove().end()
			$("#testbox").text(data);//console
			$.each(jQuery.parseJSON(data), function(i, row) {
				$("#list-bar").append('<option value='+row.id+'>'+row.black_id+'</option>');//ส่งค่าตอนคลิกที่ลิส
			});
			
			w3_open();
			$("#loading").hide();
		});
		});
	});	
		
    
	$("#go_but").click(function(){
		var page = $("#page").val();
		var partnumber = $("#partnumber").val();
		var TextBox2 = $("#TextBox2").val();
		var black = $("#TextBox3").val();
		var red = $("#rdd").val();
		var typedecision = $("#typedecision").val();
		var TextBox4 = $("#TextBox4").val();
		var search_data = {"r":red,
			 "b":black,
			 "partnumber":partnumber,
			 "TextBox4":TextBox4,
			 "TextBox2":TextBox2,
			 "typedecision":typedecision
			 };
				$.post(baseurl+"/decision/search0",search_data, function(data, status){
			$("#list-bar").find('option').remove().end()
			//$("#testbox").text(data);//console
			$("#record").text(data);
			record = data;
			var total = Math.ceil(record/1000);
			$("#tpage").text('รวม '+total+' หน้า');
			//$("#testbox").text(record+'รวม '+total+' หน้า');
			spinner.spinner( "enable" );
			spinner.spinner({
				max: total,
				min: 1,
			});
		$.post(baseurl+"/decision/search",
			{"r":red,
			"b":black,
			"partnumber":partnumber,
			"TextBox4":TextBox4,
			"TextBox2":TextBox2,
			"typedecision":typedecision,
			 "page":page
			 }, function(data, status){
			$("#list-bar").find('option').remove().end()
			$("#testbox").text(data);//console
			$.each(jQuery.parseJSON(data), function(i, row) {
				$("#list-bar").append('<option value='+row.id+'>'+row.black_id+'</option>');//ส่งค่าตอนคลิกที่ลิส
			});
			w3_open();
		});
		});
	});
		//+++++++++++++++++++++ท่อนล่างไม่แก้++++++++++++++++++++++++++++++++
	$("#list-bar").change(function() {
	  //alert( "Handler for .select() called." );
	  //$("#testbox").text($("#list-bar").val());
	  var str = "";
	  //str = $("#list-bar").val();
	  str = $(this).val();
	  $.get(baseurl+"/decision/search2?id="+str, function(data, status){
			row = jQuery.parseJSON(data);
			$("#testbox").text(data);//consol
			//*******ใส่ข้อมูล
			$('#show_id').val(row.idau);//id
			$("#callow").text(row.callow+"สำหรับใช้สืบค้นคำพิพากษา");
			//$("#ticket_c").text(row.ticket);
			$('#text9').val(row.c_court_code);//ศาล
			//$('#text10').val(row.l2);//ชั้นของคดี
			$('#show_black').val(row.b1);//เลขดำ
			$('#text102').val(row.date_sent);//วันตัดสิน
			$('#show_red').val(row.rednumber);//เลขแดง
			//$('#show_rdu').val(row.reduton);//เลขแดงอุทธรณ์
			//$('#show_rdde').val(row.reddeeka);//เลขแดงฎีกา
			//$('#text103').val(row.j1);//ผู้พิพากษาตัดสิน
			//$('#text104').val(row.j1p);//องค์คณะ
			//$('#show_text').val(row.idau);//หมายเหตุ
			$('#text105').val(row.about_case);//เรื่อง
			//$('#text106').val(row.tags);//คำสำคัญ
			/*if($.isBlank(row.wherepdf)){
				$('#word_but').attr('disabled', 'disabled');
				$('#word_but').val("ไม่มีไฟล์ word");
			}else{
				$('#word_but').removeAttr('disabled');//ปุ่มไฟล์ Word 
				$('#word_but').val("เปิด ไฟล์  word");
			}*/
			$('#text107').val(row.wherepdf);//ไฟล์ Word 
			$('#word_form').attr('action', 'decision/word_load/1?d='+row.idau);//formไฟล์ Word 
			//$('#text108').val(row.whereword);//ไฟล์ PDF
			if($.isBlank(row.whereword)){
				$('#pdf_but').attr('disabled', 'disabled');
				$('#pdf_but').val("ไม่มีไฟล์ pdf");
				$('#pdf_form').attr('action', '');//formไฟล์ pdf
				$('#text108').val('');
				$('#pdf1').text('');
			}else{
				$('#pdf_but').removeAttr('disabled');//ปุ่มไฟล์ pdf 
				$('#pdf_but').val("เปิด ไฟล์ pdf");
				$('#pdf_form').attr('action', 'decision/pdf_load/');//formไฟล์ pdf
				$('#text108').val(row.pass_pdf);
				if(row.pdf1==null||row.pdf1=='null'||!row.pdf1) {$('#pdf1').text('');}
				else{$('#pdf1').text(' จำนวน '+row.pdf1+' หน้า'); }
				
			}
			$('#d3case').html(row.d3);//คำพิพากษาชั้นต้น  ฝั่งซ้ายเป็น ชื่อ คอนโทรล ฝั้งขวาเป็นตัวแปร json ที่ส่งค่ามาจากไฟล์ search2
			//********************
			 selectTab('result');
		});
	});
	$("#open_list").click(function(){
		w3_open();
	});
	$("#close_list").click(function(){
		w3_close();
	});
	
	function selectTab(tabName) {
    $("#tabs").tabs("option", "active", $(tabName + "Selector").index());
}
	function w3_open() {
	$("#main").css("marginLeft","160px");
	$(".w3-sidenav").css("width","160px");
	$(".w3-sidenav").css("display","block");
	$(".w3-opennav").css("display","none");
	}
	function w3_close() {
	$("#main").css("marginLeft","0%");
	$(".w3-sidenav").css("display","none");
	$(".w3-opennav").css("display","inline-block");
	}
	
});
