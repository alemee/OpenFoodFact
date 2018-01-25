<?php
if($this->input->post('nom')!=null){
	echo validation_errors(); 	
}
?>
<!-- multistep form -->
<?php echo form_open('product/create','id="msform"') ?>
	<!-- progressbar -->
	<ul id="progressbar">
	    <li class="active">Informations</li>
	    <li>Contenu</li>
	    <li>Valeurs nutritionnelles</li>
	    <li>Vitamines</li>
	    <li>Mineraux</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Ajoutez votre produit</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 1</h3>
		<input type="text" name="nom" placeholder="Nom (*)" value="<?php echo set_value('nom');?>"/><br>
		<input type="text" name="marque" placeholder="Marque (*)" value="<?php echo set_value('marque');?>"/><br>
		<input type="text" name="quantite" placeholder="Quantité" value="<?php echo set_value('quantite');?>"/><br>
		<input type="text" name="pays" placeholder="Pays (*)" value="<?php echo set_value('pays');?>"/><br>
		<input type="text" name="categories" placeholder="Catégorie(s) (split on ',')" value="<?php echo set_value('categories');?>"/><br>
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Donnez des informations</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 2</h3>
		<textarea name="ingredients" placeholder="Liste des ingrédients (split on ',')" value="<?php echo set_value('ingredients');?>"></textarea>
		<textarea name="additifs" placeholder="Liste des additifs (split on ',')" value="<?php echo set_value('additifs');?>"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Valeurs nutritionnelles pour 100g (en g)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 3</h3>
		<input type="texte" name="nutriscore" placeholder="Nutriscore (a,b,c,d,e)" /><br>
		<input type="number" name="energy" step="0.001" placeholder="Energy" value="<?php echo set_value('energy');?>"/><br>
		<input type="number" name="glucides" step="0.001" placeholder="Glucides" value="<?php echo set_value('glucides');?>"/><br>
		<input type="number" name="sucre" step="0.001" placeholder="dont sucres"value="<?php echo set_value('sucre');?>"/><br>
		<input type="number" name="lipides" step="0.001" placeholder="Lipides" value="<?php echo set_value('lipides');?>"/><br>
		<input type="number" name="gras_sature" step="0.001" placeholder="dont acides gras saturés" value="<?php echo set_value('gras_sature');?>"/><br>
		<input type="number" name="proteines" step="0.001" placeholder="Protéines" value="<?php echo set_value('proteines');?>"/><br>
		<input type="number" name="fibres" step="0.001" placeholder="Fibres alimentaires" value="<?php echo set_value('fibres');?>"/><br>
		<input type="number" name="sel" step="0.001" placeholder="Sel" value="<?php echo set_value('sel');?>"/><br>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Vitamines pour 100g (en g)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 4</h3>
		<input type="number" name="vitamine_a" step="0.001" placeholder="Vitamine A" value="<?php echo set_value('vitamine_a');?>"/><br>
		<input type="number" name="vitamine_b1" step="0.001" placeholder="Vitamine B1" value="<?php echo set_value('vitamine_b1');?>"/><br>
		<input type="number" name="vitamine_b2" step="0.001" placeholder="Vitamine B2" value="<?php echo set_value('vitamine_b2');?>"/><br>
		<input type="number" name="vitamine_pp" step="0.001" placeholder="Vitamine PP" value="<?php echo set_value('vitamine_pp');?>"/><br>
		<input type="number" name="vitamine_b6" step="0.001" placeholder="Vitamine B6" value="<?php echo set_value('vitamine_b6');?>"/><br>
		<input type="number" name="vitamine_b9" step="0.001" placeholder="Vitamine B9" value="<?php echo set_value('vitamine_b9');?>"/><br>
		<input type="number" name="vitamine_b12" step="0.001" placeholder="Vitamine B12" value="<?php echo set_value('vitamine_b12');?>"/><br>
		<input type="number" name="vitamine_c" step="0.001" placeholder="Vitamine C" value="<?php echo set_value('vitamine_c');?>"/><br>
		<input type="number" name="vitamine_d" step="0.001" placeholder="Vitamine D" value="<?php echo set_value('vitamine_d');?>"/><br>
		<input type="number" name="vitamine_e" step="0.001" placeholder="Vitamine E" value="<?php echo set_value('vitamine_e');?>"/><br>
		<input type="number" name="vitamine_k" step="0.001" placeholder="Vitamine K" value="<?php echo set_value('vitamine_k');?>"/><br>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Mineraux pour 100g (en g)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 5</h3>
		<input type="number" name="sodium" step="0.001" placeholder="Sodium" value="<?php echo set_value('sodium');?>"/><br>
		<input type="number" name="potassium" step="0.001" placeholder="Potassium" value="<?php echo set_value('potassium');?>"/><br>
		<input type="number" name="calcium" step="0.001" placeholder="Calcium" value="<?php echo set_value('calcium');?>"/><br>
		<input type="number" name="fer" step="0.001" placeholder="Fer" value="<?php echo set_value('fer');?>"/><br>
		<input type="number" name="magnesium" step="0.001" placeholder="Magnesium" value="<?php echo set_value('magnesium');?>"/><br>
		<input type="number" name="zinc" step="0.001" placeholder="Zinc" value="<?php echo set_value('zinc');?>"/><br>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="submit" class="action-button" value="Ajouter" />
	</fieldset>
<?php echo form_close(); ?>
<?php echo "<p class='retour'>".anchor('user/membres','Retour à l\'espace membres')."</p>";?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

</script>