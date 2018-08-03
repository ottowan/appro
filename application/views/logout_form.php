<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>ค้นคำสั่งสำนักงานศาล</title>
	<link rel="shortcut icon" type="image/ico" href="images/favicon.png"/>
	<link rel="stylesheet" href="<?PHP echo base_url("bower_components/w3css-v4/w3.css");?>"> 
    <meta http-equiv="content-type" content="text/html;charset=utf-8"> 

</head>
<body class="">
<div class="w3-display-middle w3-card-4" style="width:500px">
<div class="w3-container w3-blue-grey">
	<h1><?=$title?></h1>
</div>
<div class=" w3-container">
    <form class="" action="<?PHP echo base_url('login');?>" method="post">
    <div class="w3-panel w3-leftbar w3-border-red w3-text-red w3-khaki w3-hide w3-animate-opacity" id="Error">
        <?PHP echo validation_errors();?>
    </div>
        <button class="w3-btn w3-dark-grey" id="submit" type="submit">Login</button>
	</form>

</div>
</div> 
<script>
        function showerror() {
			var x = document.getElementById("Error");
			if (x.className.indexOf("w3-hide") != -1) {
					
                    x.className = x.className.replace(" w3-hide", "");
			}
		}
        var error_txt="<?PHP if(isset($error))echo $error; echo validation_errors();?>";
        document.getElementById("Error").innerHTML=error_txt;
        if(error_txt!=""){
            showerror();
        }
    </script>
</body>
</html>