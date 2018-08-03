<!DOCTYPE html>
<html>
<head>
<title>สืบค้นคำพิพากษาและคำสั่ง</title>
<?PHP

echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
echo addscript('js/oopw.js');
echo addscript('js/jquery-1.11.3.min.js');
echo addscript('js/jquery-ui.min.js');
echo addscript('js/jquery.maskedinput.min.js');
echo link_tag('css/w3.css');
echo link_tag('css/jquery-ui.min.css');
echo link_tag('css/mystyle.css');
echo link_tag('https://fonts.googleapis.com/icon?family=Material+Icons');
echo link_tag('img/favicon.ico', 'shortcut icon', 'image/ico');
?>
<script type="text/javascript"> 
	var baseurl = "<?= site_url() ?>";
	</script>
<?PHP
echo addscript('js/jquery.js');
?>
 <script>
  $(function() {

  });
  </script>
</head>
<body>
<?PHP
	
	echo tag_open("nav","w3-sidenav w3-indigo w3-card-2 hide","",'style="display:none;"');
	echo tag_open("i","material-icons w3-xlarge  w3-right w3-closenav w3-padding","close_list");
	echo "close";
	echo tag_close("i");
	echo tag_open("header","w3-container w3-padding","");
	echo "เลขคดี";
	echo tag_close("header");
	echo div_open("center","record_txt");
	echo "พบ ";
	echo tag_open("span","","record");
	echo tag_close("span");
	echo "คดี";
	echo div_close();
	echo form_dropdown('list-bar', array(), '', ' id="list-bar" size="23" class="bar  w3-sand" height="100%"');
	echo div_open("center","");
	echo div_open("","");
	echo tag_open("span","","");
	echo "หน้าที่";
	echo form_input(array(
              'name'        => 'page',
              'id'          => 'page',
              'style'   => 'width:100px'
            ));
	echo tag_close("span");
	echo div_close();
	echo div_open("","tpage");
	echo div_close();	
	echo div_open("","");
	echo form_button('go_but', 'ไป',' id="go_but" class="w3-btn"');
	echo div_close();
	echo div_close();
	echo tag_close("nav","","");
	
	echo div_open("","main");
	echo tag_open("header","w3-topnav w3-large w3-indigo","token");
	echo anchor('user/logout', 'Logout', 'class="right"');
	echo anchor('log', 'Log', 'class="right"');
	//echo anchor("forminput.php", 'บันทึกข้อมูล', 'class="right"');
	echo tag_open("i","material-icons w3-large w3-opennav","open_list");
	echo "menu";
	echo tag_close("i");
	echo tag_open("span","","");
	echo anchor('decision', 'สืบค้นคำพิพากษาและคำสั่งของศาลชั้นต้นและศาลสูง');
	echo tag_close("span");
	echo tag_close("header");
	echo div_open("w3-card-2 w3-red","");
	echo "ยินดีต้อนรับ ".$user_fname;
	echo div_close();
	
	echo div_open("","tabs");
	echo "<ul>";
	echo '<li id="searchselector"><a href="#search">ค้นหา</a></li>';
	echo '<li id="resultselector"><a href="#result">รายละเอียด</a></li>';
	echo "</ul>";
	echo form_open('', array('method'=>'post'));
	echo div_open("","search");
	echo tag_open("section","","");
	echo form_button('search_but', 'ค้นหา',' id="search_but" class="w3-btn"');
	//echo form_reset('search_reset', 'ล้าง',' id="reset_but" class="w3-btn blue-grey"');
	echo anchor('decision', 'ล้าง', 'class="w3-btn" style="color:light-grey;"');
	echo tag_open('span','','loading');
	echo img('img/ajax-loader.gif');
	echo "กำลังค้นหา";
	echo tag_close('span');
	echo div_open("w3-container w3-padding","search_form");
	
	/*echo div_open("w3-row","");
	echo div_open("w3-col m2 l2","");
	echo form_label('ชั้นศาล* :', 'ComboBox2');
	echo div_close();
	echo div_open("w3-col m2 l2","");
	$case_level = array('1'=>"ชั้นต้น",'2'=>"อุทธรณ์",'3'=>"ฎีกา");
	echo form_dropdown('ComboBox2', $case_level, '', ' id="ComboBox2" style="width:100%"');
	echo div_close();
	echo div_close();*/
	
	echo div_open("w3-row","");
	echo div_open("w3-col m2 tright","");
	echo form_label('ภาค* :', 'partnumber');
	echo div_close();
	echo div_open("w3-col m2","ส่วนกลาง");
	$part_number = array('p0'=>'ส่วนกลาง',
						'p1'=>'ภาค 1',
						'p2'=>'ภาค 2',
						'p3'=>'ภาค 3',
						'p4'=>'ภาค 4',
						'p5'=>'ภาค 5',
						'p6'=>'ภาค 6',
						'p7'=>'ภาค 7',
						'p8'=>'ภาค 8',
						'p9'=>'ภาค 9',
						'ph'=>'ศาลสูง',
						'ps'=>'ศาลพิเศษ',
						'pl'=>'ศาลชำนาญพิเศษ',
						'pb'=>'ศาลชั้นต้นในเขตกรุงเทพ',);
	echo form_dropdown('partnumber', $part_number, 'p0', ' id="partnumber" style="width:100%"');
	echo div_close();
	echo div_open("w3-col m1","");
	echo div_close();
	echo div_open("w3-col m2 tright","");
	echo form_label('ศาล* :', 'TextBox2');
	echo div_close();
	echo div_open("w3-col m5","");
	echo form_dropdown('TextBox2', array(""=>""), '', ' id="TextBox2" style="width:100%"');
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("black_code","");
	echo div_open("w3-col m2 l2 tright","");
	echo form_label('เลขดำ : ', 'TextBox3');
	echo div_close();
	echo div_open("w3-col m2 l2","");
	echo form_input(array(
              'name'        => 'TextBox3',
              'id'          => 'TextBox3',
              'style'   => 'width:100%;color: #FFFFFF; background-color: #330000;'
            ));
	echo div_close();
	echo div_open("w3-col m1","");
	echo div_close();
	echo div_close();
	echo div_open("rdd","");
	echo div_open("w3-col m2 tright","");
	echo form_label('เลขแดง(ชั้นต้น): ', 'rdd');
	echo div_close();
	echo div_open("w3-col m2","");	
	echo form_input(array(
              'name'        => 'rdd',
              'id'          => 'rdd',
              'style'   => 'width:100%;color: #FFFFFF; background-color: #CC0000;'
            ));
	echo div_close();
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("rdu","");
	echo div_open("w3-col m2 tright","");
	echo form_label('เลขแดง(อุทธรณ์): ', 'rdu');
	echo div_close();
	echo div_open("w3-col m2","");
	echo form_input(array(
              'name'        => 'rdu',
              'id'          => 'rdu',
              'style'   => 'width:100%; background-color: #FFB2E5;'
            ));
	echo div_close();
	echo div_close();
	echo div_open("rdde","");
	echo div_open("w3-col m2 tright","");
	echo form_label('เลขแดง(ฎีกา): ', 'rdde');
	echo div_close();
	echo div_open("w3-col m2","");
	echo form_input(array(
              'name'        => 'rdde',
              'id'          => 'rdde',
              'style'   => 'width:100%; background-color: #FFB2E5;'
            ));
	echo div_close();
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l3","");
	echo form_label('คำพิพากษา/คำสั่ง : ', 'typedecision');
	echo div_close();
	echo div_open("w3-col m12 l2","");
	$doc_type = array("","คำพิพากษา","คำสั่ง");
	echo form_dropdown('typedecision', $doc_type, '', ' id="typedecision" style="width:100%"');
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('ข้อหา/ฐานความผิด : ', 'TextBox4');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'TextBox4',
              'id'          => 'TextBox4',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('โจทก์ : ', 'jj');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'jj',
              'id'          => 'jj',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('จำเลย : ', 'jl');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'jl',
              'id'          => 'jl',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('รหัสเฉพาะคดี (ticket key) : ', 'ticket');
	echo div_close();
	echo div_open("w3-col m12 l7","");
	echo form_input(array(
              'name'        => 'ticket',
              'id'          => 'ticket',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('คำสำคัญ(คำค้น) : ', 'TextBox5');
	echo div_close();
	echo div_open("w3-col m12 l7","");
	echo form_input(array(
              'name'        => 'TextBox5',
              'id'          => 'TextBox5',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_open("w3-col m12 l1","");
	echo form_label('วันตัดสิน : ', 'dt1');
	echo div_close();
	echo div_open("w3-col m12 l2","");
	echo form_input(array(
              'name'        => 'dt1',
              'id'          => 'dt1',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('ผู้พิพากษาตัดสิน : ', 'TextBox6');
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo form_input(array(
              'name'        => 'TextBox6',
              'id'          => 'TextBox6',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('องค์คณะ : ', 'TextBox9');
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo form_input(array(
              'name'        => 'TextBox9',
              'id'          => 'TextBox9',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('คำสำคัญ (เนื้อความ) : ', 'TextBox11');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'TextBox11',
              'id'          => 'TextBox11',
              'style'   => 'width:100%;'
            ));
	echo div_close();
	echo div_close();
	echo div_close();
	echo tag_close("section");
	echo div_close();
	echo form_close();	
	echo div_open("","result");
	echo tag_open("article","","");
	echo div_open("w3-container w3-padding","data_form");
	echo div_open("w3-card-2 w3-yellow","");
	echo '<p id="callow" style="text-indent:20px"></p>';
	echo div_close();
	echo div_open("w3-row w3-aqua","");
	echo div_open("w3-col m12 l3 bold","");
	echo ' รหัสเฉพาะคดี (ticket key) : ';
	echo div_close();
	echo div_open("w3-col m12 l9","ticket_c");
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l1","");
	echo form_label('ศาล : ', 'text9');
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo form_input(array(
              'name'        => 'text9',
              'id'          => 'text9',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m12 l2","");
	echo form_label('ชั้นของคดี : ', 'text10');
	echo div_close();
	echo div_open("w3-col m12 l2","");
	echo form_input(array(
              'name'        => 'text10',
              'id'          => 'text10',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m6 l2 tright","");
	echo form_label('เลขดำ : ', 'show_black');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'show_black',
              'id'          => 'show_black',
              'style'   => 'color: #FFFFFF; background-color: #330000;width:100%;',
			  'class'	=> 'center',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m6 l2 tright","");
	echo form_label('เลขแดง(อุทธรณ์) : ', 'show_rdu');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'show_rdu',
              'id'          => 'show_rdu',
              'style'   => 'color: #FFFFFF; background-color: #CC0000;width:100%;',
			  'class'	=> 'center',
			  'readonly' => 'readonly'
            ));
	echo div_close();	
	
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m6 l2 tright","");
	echo form_label('เลขแดง : ', 'show_red');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'show_red',
              'id'          => 'show_red',
              'style'   => 'color: #FFFFFF; background-color: #CC0000;width:100%;',
			  'class'	=> 'center',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m6 l2 tright","");
	echo form_label('เลขแดง(ฎีกา) : ', 'show_rdde');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'show_rdde',
              'id'          => 'show_rdde',
              'style'   => 'color: #FFFFFF; background-color: #CC0000;width:100%;',
			  'class'	=> 'center',
			  'readonly' => 'readonly'
            ));
	echo div_close();	
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m6 l2","");
	echo form_label('วันตัดสิน : ', 'text102');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'text102',
              'id'          => 'text102',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l3","");
	echo form_label('ผู้พิพากษาตัดสิน : ', 'text103');
	echo div_close();
	echo div_open("w3-col m12 l9","");
	echo form_input(array(
              'name'        => 'text103',
              'id'          => 'text103',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l3","");
	echo form_label('องค์คณะ : ', 'text104');
	echo div_close();
	echo div_open("w3-col m12 l9","");
	echo form_input(array(
              'name'        => 'text104',
              'id'          => 'text104',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l3","");
	echo form_label('ข้อหา/ฐานความผิด : ', 'text105');
	echo div_close();
	echo div_open("w3-col m12 l9","");
	echo form_input(array(
              'name'        => 'text105',
              'id'          => 'text105',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('คำสำคัญ : ', 'text106');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'text106',
              'id'          => 'text106',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l4","");
	echo div_open("right","");
	echo form_open('','id="word_form" target="_blank"');
	echo form_submit('word_but', 'เปิด ไฟล์ word' ,'id="word_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	echo div_close();
	echo form_label('ไฟล์ Word : ', 'text107');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'text107',
              'id'          => 'text107',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m12 l1","");
	echo "&nbsp;";
	echo div_close();
	echo div_open("w3-col m12 l4","");
	echo div_open("right","");
	echo form_open('','id="pdf_form" target="_blank"');
	echo form_submit('pdf_but', 'เปิด ไฟล์ pdf' ,'id="pdf_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	//echo form_button('pdf_but', 'เปิด','ONCLICK="opdf();"');
	echo div_close();
	echo form_label('ไฟล์ PDF : ', 'text108');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'text108',
              'id'          => 'text108',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l4","word2");
	echo div_open("right","");
	echo form_open('','id="word2_form" target="_blank"');
	echo form_submit('word2_but', 'เปิด ไฟล์ word' ,'id="word2_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	echo div_close();
	echo form_label('ไฟล์ Word (อุทธรณ์) : ', 'text106');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'word_file2',
              'id'          => 'word_file2',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo "&nbsp;";
	echo div_close();
	echo div_open("w3-col m12 l4","");
	echo div_open("right","");
	echo form_open('','id="pdf2_form" target="_blank"');
	echo form_submit('pdf2_but', 'เปิด ไฟล์ pdf' ,'id="pdf2_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	//echo form_button('pdf_but', 'เปิด','ONCLICK="opdf();"');
	echo div_close();
	echo form_label('ไฟล์ PDF (อุทธรณ์)  : ', 'text108');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'pdf_file2',
              'id'          => 'pdf_file2',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l4","word3");
	echo div_open("right","");
	echo form_open('','id="word3_form" target="_blank"');
	echo form_submit('word3_but', 'เปิด ไฟล์ word' ,'id="word3_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	echo div_close();
	echo form_label('ไฟล์ Word (ฎีกา) : ', 'text106');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'word_file3',
              'id'          => 'word_file3',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo "&nbsp;";
	echo div_close();
	echo div_open("w3-col m12 l4","");
	echo div_open("right","");
	echo form_open('','id="pdf3_form" target="_blank"');
	echo form_submit('pdf3_but', 'เปิด ไฟล์ pdf' ,'id="pdf3_but" class="w3-btn" disabled="disabled"');
	echo form_close();
	//echo form_button('pdf_but', 'เปิด','ONCLICK="opdf();"');
	echo div_close();
	echo form_label('ไฟล์ PDF (ฎีกา) : ', 'text108');
	echo form_input(array(
			  'type'		=> 'hidden',
              'name'        => 'pdf_file3',
              'id'          => 'pdf_file3',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l1","");
	echo form_label('โจทก์ : ', 'text109');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'text109',
              'id'          => 'text109',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m12 l1","");
	echo form_label('จำเลย : ', 'text110');
	echo div_close();
	echo div_open("w3-col m12 l10","");
	echo form_input(array(
              'name'        => 'text110',
              'id'          => 'text110',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_close();
	
	echo div_open("w3-row","");
	echo div_open("w3-col m6 l3","");
	echo form_label('วันสืบนัดแรก : ', 'text1011');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'text1011',
              'id'          => 'text1011',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m6 l3","");
	echo form_label('วันสืบนัดแรกของต่อเนื่อง : ', 'text1012');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'text1012',
              'id'          => 'text1012',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));	
	echo div_close();
	echo div_close();

	echo div_open("w3-row","");
	echo div_open("w3-col m6 l3","");
	echo form_label('วันอ่านอุทธรณ์ : ', 'text1013');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'text1013',
              'id'          => 'text1013',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));
	echo div_close();
	echo div_open("w3-col m6 l3","");
	echo form_label('วันอ่านฎีกา : ', 'text1014');
	echo div_close();
	echo div_open("w3-col m6 l2","");
	echo form_input(array(
              'name'        => 'text1014',
              'id'          => 'text1014',
              'style'   => 'width:100%;',
			  'readonly' => 'readonly'
            ));	
	echo div_close();
	echo div_close();

	echo div_open("w3-card-2 blue","case");
	echo '<p>คำพิพากษาฎีกา  (คลิกเพื่อดูรายละเอียด)</p>';
	echo div_open("w3-container","dekacase");
	echo div_close();
	echo '<p>คำพิพากษาอุทธรณ์  (คลิกเพื่อดูรายละเอียด)</p>';
	echo div_open("w3-container","utoncase");
	echo div_close();
	echo '<p>คำพิพากษาชั้นต้น/คำสั่ง (คลิกเพื่อดูรายละเอียด)</p>';
	echo div_open("w3-container","d3case");
	echo div_close();
	echo div_close();

	/*console
	echo tag_close("article");
	echo div_close();
	echo div_close();
	echo tag_open("fieldset");
	echo tag_open("legend");
	echo "console :";
	echo tag_close("legend");
	echo div_open("","testbox");
	echo div_close();
	echo tag_close("fieldset");*/
	//footer


	echo div_close();
	echo div_close();
	echo tag_close("article");
	
?>
