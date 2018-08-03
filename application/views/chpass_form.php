<div class=" w3-card-4" style="width:500px">
<div class="w3-container w3-grey">
	<h1>เปลี่ยนรหัสผ่าน</h1>
</div>
<div class=" w3-container">
    <form class="" action="<?PHP echo base_url($url);?>" method="post">
    <div class="w3-panel w3-leftbar w3-border-red w3-text-red  w3-hide w3-animate-opacity" id="Error">
        <?PHP if(isset($error))echo $error; echo validation_errors();?>
    </div>
		<label id="username">Username</label>
		<input class="w3-input" type="text" name="username" value="<?php echo set_value('username'); ?>">
		<label for="password">Password</label>
		<input class="w3-input" type="password" name="password" value="<?php echo set_value('password'); ?>">
		<label for="password">new Password</label>
		<input class="w3-input" type="password" name="newpass" value="<?php echo set_value('newpass'); ?>">
        <button class="w3-btn w3-orange" id="submit">Submit</button>
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
        var error_txt= document.getElementById("Error");
        if(error_txt.innerHTML!=""){
            showerror();
        }
</script>