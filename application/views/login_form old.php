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
echo addscript('js/common.js');
?>
</head>
<body>
<?PHP
	echo form_open('user/login', array('method'=>'post'));
	echo div_open("","main");
	echo header_open("w3-topnav w3-xlarge w3-blue","token");
	echo tag_open("i","material-icons w3-xlarge w3-opennav","open_list");
	echo "person";
	echo tag_close("i");
	echo tag_open("span","","");
	echo "สืบค้นคำพิพากษาและคำสั่งของศาลชั้นต้นและศาลสูง";
	echo tag_close("span");
	echo header_close();
	
	echo div_open("","tabs");
	echo "<ul>";
    echo '<li id="searchselector"><a href="#search">เข้าระบบ</a></li>';
	echo "</ul>";
	
	echo div_open("","search");
	echo tag_open("section","","");
	echo form_submit('submit', 'เข้าระบบ','class="w3-btn w3-theme"');
	echo form_reset('reset', 'ล้าง','class="w3-btn w3-theme"');
	echo tag_open("span","highlight","error");
	echo $error;
	echo tag_close("span");
	echo div_open("w3-container w3-padding","search_form");
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('ชื่อผู้ใช้งาน : ', 'username');
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo form_input(array(
              'name'        => 'username',
              'id'          => 'user',
              'style'   => 'width:100%'
            ));
	echo div_close();
	echo div_close();
	echo div_open("w3-row","");
	echo div_open("w3-col m12 l2","");
	echo form_label('รหัสผ่าน : ', 'password');
	echo div_close();
	echo div_open("w3-col m12 l5","");
	echo form_password(array(
              'name'        => 'password',
              'id'          => 'password',
              'style'   => 'width:100%',
		'autocomplete' => 'off'
            ));
	echo div_close();
	echo div_close();
	echo div_open("w3-row","");
	echo div_open("w3-container w3-card-2 m12 l2 w3-yellow","");
	//echo div_open("","");
	//echo anchor('download/file/prodecision', 'Download โปรแกรมอัพโหลดคำพิพากษา', '');
	//echo anchor('download/file/prodecision', img('img/hand2.gif').img('img/header.png', FALSE,'alt="Download โปรแกรมอัพโหลดคำพิพากษา"'), '');
	//echo anchor('http://edu.coj.go.th/wd/dst/', img('img/hand2.gif').img('img/header.png', FALSE,'alt="Download โปรแกรมอัพโหลดคำพิพากษา"'), '');
	//echo div_close();
	/*echo div_open("","");
	echo anchor(base_url("document/Decision_install.pdf"), img('img/hand2.gif',FALSE,'width="20px"').'ขั้นตอนการติดตั้งโปรแกรมอัพโหลดคำพิพากษา', '');
	echo div_close();
	echo div_open("","");
	echo anchor(base_url("document/Access_config.pdf"), img('img/hand2.gif',FALSE,'width="20px"').'ขั้นตอนการตั้งค่ากับฐานข้อมูล Access', '');
	echo div_close();
	echo div_open("","");
	echo anchor(base_url("document/Decision_guide.pdf"), img('img/hand2.gif',FALSE,'width="20px"').'ขั้นตอนการใช้งานโปรแกรมอัพโหลดคำพิพากษา', '');
	echo div_close();
	echo div_open("","");
	echo anchor(base_url("document/SendTO_guide.pdf"), img('img/hand2.gif',FALSE,'width="20px"').'ขั้นตอนการใช้งานโปรแกรมส่งข้อมูลคดีเข้าระบบ (Sendto)', '');
	echo div_close();*/
	//echo div_open("","");
	//echo anchor('url', 'Download ระเบียนการตัดถ่ายคำพิพากษา', '');
	//echo div_close();
	echo div_close();
	echo div_close();
	echo div_close();
	echo div_close();
	echo tag_close("section");
	
	
	echo div_close();

	echo div_close();
	echo form_close();
?>
