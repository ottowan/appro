<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
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
    <form class="" action="<?PHP echo base_url($url);?>" method="post">
    <div class="w3-panel w3-leftbar w3-border-red w3-text-red w3-khaki w3-hide w3-animate-opacity" id="Error">
        <?PHP if(isset($error))echo $error; echo validation_errors();?>
    </div>
		<label id="username">Username</label>
		<input class="w3-input" type="text" name="username" value="<?php echo set_value('username'); ?>">
		<label for="password">Password</label>
		<input class="w3-input" type="password" name="password" value="<?php echo set_value('password'); ?>">
        <button class="w3-btn w3-dark-grey" id="submit" type="submit">Submit</button>
	</form>

</div>
<div style="text-align:right;"><!--a href="">admin>></a--></div>
</div> 
<script>
        function showerror() {
			var x = document.getElementById("Error");
			if (x.className.indexOf("w3-hide") != -1) {
					
                    x.className = x.className.replace(" w3-hide", "");
			}
		}
        var error_txt= document.getElementById("Error");
        if(error_txt.innerHTML!=""){
            showerror();
        }
    </script>
</body>
</html>