<div class="login">
<?php if(isset($error)):?>
	<?php echo $error;?>
<?php endif;?>
<?php echo validation_errors();?>
<?php echo form_open('user/signin') ?>
	<input type="email" class="inputlogin" name="email" placeholder="E-mail" value="<?php echo set_value('email');?>"/><br>
	<input type="password" class="inputlogin" name="pass" placeholder="Password" value="<?php echo set_value('pass');?>"/><br><br>
	<button type="submit" class="btn btn-primary btn-block btn-large">Entrer dans le réseau</button>
<?php echo form_close(); ?>
<?php echo "<p class='retour'>".anchor('user','Inscription')."</p>";?>
</div>