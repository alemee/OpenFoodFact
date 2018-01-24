<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8" />
		<title><?php echo $this->session->userdata('login')." - ".$content;?></title>

		<!--  Normalement avec cette ligne plus le dossier assets que j'ai rajouté le bootstrap est en place, mais faudrait tester vraiment quoi, du coup comme demain matin je serais à l'iut je vais tenter de faire ça bien mais si j'y arrive pas à temps on garde le design actuel vu qu'il marche quand même relativement bien -->

		<!--

		<link href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

		-->

		<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div id ="global">
			<header>
				<h1><?php echo "<h1>".anchor('user/membres','OPEN FOOD FACT')."</h1>";?></h1>
				<?php 
				if($this->session->userdata('login') || $this->session->userdata('logged')){
					echo "<p>".anchor('user/signout','Deconnexion')."<br><hr />";
				}
				?>
			</header>
			<section>
				<?php if(isset($title)) echo "<h2>".$title."</h2>"; ?>
				<?php $this->load->view($content);?>
			</section>
			<footer>
				<?php if($this->session->userdata('login') || $this->session->userdata('logged')): ?>
				<strong>&copy; <a target="_blank" href="http://www.clementyoudec.fr">Clément Youdec</a> - Alix Lemee - Maxime Blondel |  <a target="_blank" href="http://blacknegative.com">2017</a></strong>
			<?php endif; ?>
			</footer> 
		</div>
	</body>
</html>
