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
echo addscript('js/common.js');
?>
 <script>
  $(function() {
	$("#sdate").mask("99/99/9999",{placeholder:"__/__/____"});
	$("#reset_but").click(function(){
		$("#sdate").val("");
		$("#court").val("");
	});
  });
  </script>
</head>
<body>
<?PHP
	
	
	echo div_open("","main");
	echo tag_open("header","w3-topnav w3-large w3-green","token");
	echo anchor('user/logout', 'Logout', 'class="right"');
	echo anchor('log', 'Log', 'class="right"');
	//echo anchor("forminput.php", 'บันทึกข้อมูล', 'class="right"');
	echo tag_open("i","material-icons w3-large w3-opennav","open_list");
	echo "menu";
	echo tag_close("i");
	echo tag_open("span","","");
	echo anchor('decision', "สืบค้นคำพิพากษาและคำสั่งของศาลชั้นต้นและศาลสูง");
	echo tag_close("span");
	echo tag_close("header");
	echo div_open("w3-card-2 w3-light-green","");
	echo "ยินดีต้อนรับ ".$user_fname;
	echo div_close();
	
	echo div_open("","tabs");
	echo "<ul>";
	echo '<li id="searchselector"><a href="#search">ประวัติการค้นหา</a></li>';
	echo "</ul>";
	echo form_open('log', array('method'=>'post'),array('page'=>$page));
	echo div_open("","search");
	echo tag_open("section","","");
	echo form_submit('search_but', 'ค้นหา',' id="search_but" class="w3-btn"');
	echo form_button('search_reset', 'ล้าง',' id="reset_but" class="w3-btn blue-grey"');
	echo validation_errors('<span class="error">','</span>');
	echo div_open("w3-container w3-padding","search_form");
	
	echo div_open("w3-row","");
	echo div_open("w3-col m2 l2","");
	echo form_label('ศาล :', 'court');
	echo div_close();
	echo div_open("w3-col m3 l2","");
	echo form_input(array(
              'name'        => 'court',
              'id'          => 'court',
              'style'   => 'width:100%;',
			  'value'	=> set_value('court')
            ));
	echo div_close();
	echo div_open("w3-col m2 l4","");
	echo div_close();	
	echo div_open("w3-col m2 l2","");
	echo form_label('ปี (วัน/เดือน/พ.ศ.) :', 'sdate');
	
	echo div_close();
	echo div_open("w3-col m3 l2","");
	echo form_input(array(
              'name'        => 'sdate',
              'id'          => 'sdate',
              'style'   => 'width:100%;',
			  'value'	=> set_value('sdate')
            ));	
	echo div_close();
	echo div_open("w3-col m3 l2","");
	echo form_button('print_but', 'พิมพ์',' id="print_but" class="w3-btn" onclick="window.print();"');
	echo div_close();
	echo div_close();
	echo div_open('datatable','datatable');
	$this->table->set_heading('ลำดับ','IP' ,'ชื่อ-สกุล', 'หน่วยงาน','การกระทำ','วันที่','เลขที่คดี','ของหน่วยงาน');
	$template = array(
			'table_open' => '<table class="w3-table w3-bordered w3-striped w3-card-4">'
	);
	$this->table->set_template($template);
	echo $this->table->generate($result);
	$this->table->clear();
	$this->table->add_row(	'รวม', 
							$total_page.' หน้า',
							form_submit('search_but', '1', 'id="min" class="w3-btn w3-grey"').
							form_submit('search_but', 'ก่อนหน้า', 'id="previous" class="w3-btn w3-blue-grey"').
							'หน้าที่ '.$page.' '.
							form_submit('search_but', 'ถัดไป', 'id="next" class="w3-btn w3-blue-grey"').
							form_submit('search_but', $total_page, 'id="max" class="w3-btn w3-grey')
							);
	echo $this->table->generate();
	
	echo div_close();
	echo div_close();
	echo tag_close("section");
	echo div_close();
	echo form_close();	
	echo div_close();
	
?>
