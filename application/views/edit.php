<?php
if($this->input->post('nom')!=null){
	echo validation_errors(); 	
}
?>
<!-- multistep form -->
<?php echo form_open('product/edit/'.$infos['prod'][0]['id'],'id="msform"') ?>
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
		<h2 class="fs-title">Modifiez votre produit</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 1</h3>
		<input type="text" name="nom" placeholder="Nom (*)" value="<?php echo empty($infos['prod'][0]['nom'])?'':$infos['prod'][0]['nom'] ?>"/><br>
		<input type="text" name="marque" placeholder="Marque (*)" value="<?php echo empty($infos['prod'][0]['marque'])?'':$infos['prod'][0]['marque'] ?>"/><br>
		<input type="text" name="quantite" placeholder="Quantité" value="<?php echo empty($infos['prod'][0]['quantite'])?'':$infos['prod'][0]['quantite'] ?>"/><br>
		<input type="text" name="pays" placeholder="Pays (*)" value="<?php echo empty($infos['pays'][0]['pays'])?'':$infos['pays'][0]['pays'] ?>"/><br>
		<input type="text" name="categories" placeholder="Catégorie(s) (split on ',')" value="<?php echo empty($infos['categories'][0]['categorie'])?'':$infos['categories'][0]['categorie'] ?>"/><br>
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

<?php
//String des ingredients
if(!empty($infos['ingredients'])){
    $i=0; $str='';
    foreach ($infos['ingredients'] as $array) {
        if($i==0) $str=$array['ingredient'];
        else $str=$str.', '.$array['ingredient'];
        $i++;
    }
}

//String des additifs
if(!empty($infos['additifs'])){
    $i=0; $str2='';
    foreach ($infos['additifs'] as $array) {
        if($i==0) $str2=$array['additif'];
        else $str2=$str2.', '.$array['additif'];
        $i++;
    }
}
?>

	<fieldset>
		<h2 class="fs-title">Donnez des informations</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 2</h3>
		<textarea name="ingredients" placeholder="Liste des ingrédients (split on ',')"><?php echo empty($infos['ingredients'])?'':$str ?></textarea>
		<textarea name="additifs" placeholder="Liste des additifs (split on ',')" value=""><?php echo empty($infos['additifs'])?'':$str2 ?></textarea>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Valeurs nutritionnelles pour 100g (en g)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 3</h3>
		<input type="texte" name="nutriscore" placeholder="Nutriscore (a,b,c,d,e)" value="<?php echo empty($specs['valeurs'][0]['nutriscore'])?'':$specs['valeurs'][0]['nutriscore'] ?>"/><br>
		<input type="number" name="energy" step="0.001" min="0"  placeholder="Energy" value="<?php echo empty($specs['valeurs'][0]['energy'])?'':$specs['valeurs'][0]['energy'] ?>"/><br>
		<input type="number" name="glucides" step="0.001" min="0"  placeholder="Glucides" value="<?php echo empty($specs['valeurs'][0]['glucides'])?'':$specs['valeurs'][0]['glucides'] ?>"/><br>
		<input type="number" name="sucre" step="0.001" min="0"  placeholder="dont sucres"value="<?php echo empty($specs['valeurs'][0]['sucre'])?'':$specs['valeurs'][0]['sucre'] ?>"/><br>
		<input type="number" name="lipides" step="0.001" min="0"  placeholder="Lipides" value="<?php echo empty($specs['valeurs'][0]['lipides'])?'':$specs['valeurs'][0]['lipides'] ?>"/><br>
		<input type="number" name="gras_sature" step="0.001" min="0"  placeholder="dont acides gras saturés" value="<?php echo empty($specs['valeurs'][0]['gras_sature'])?'':$specs['valeurs'][0]['gras_sature'] ?>"/><br>
		<input type="number" name="proteines" step="0.001" min="0"  placeholder="Protéines" value="<?php echo empty($specs['valeurs'][0]['proteines'])?'':$specs['valeurs'][0]['proteines'] ?>"/><br>
		<input type="number" name="fibres" step="0.001" min="0"  placeholder="Fibres alimentaires" value="<?php echo empty($specs['valeurs'][0]['fibres'])?'':$specs['valeurs'][0]['fibres'] ?>"/><br>
		<input type="number" name="sel" step="0.001" min="0"  placeholder="Sel" value="<?php echo empty($specs['valeurs'][0]['sel'])?'':$specs['valeurs'][0]['sel'] ?>"/><br>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Vitamines pour 100g (en mg)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 4</h3>
		<input type="number" name="vitamine_a" step="0.001" min="0"  placeholder="Vitamine A" value="<?php echo empty($specs['vitamines'][0]['vitamine_a'])?'':$specs['vitamines'][0]['vitamine_a'] ?>"/><br>
		<input type="number" name="vitamine_b1" step="0.001" min="0"  placeholder="Vitamine B1" value="<?php echo empty($specs['vitamines'][0]['vitamine_b1'])?'':$specs['vitamines'][0]['vitamine_b1'] ?>"/><br>
		<input type="number" name="vitamine_b2" step="0.001" min="0"  placeholder="Vitamine B2" value="<?php echo empty($specs['vitamines'][0]['vitamine_b2'])?'':$specs['vitamines'][0]['vitamine_b2'] ?>"/><br>
		<input type="number" name="vitamine_pp" step="0.001" min="0"  placeholder="Vitamine PP" value="<?php echo empty($specs['vitamines'][0]['vitamine_pp'])?'':$specs['vitamines'][0]['vitamine_pp'] ?>"/><br>
		<input type="number" name="vitamine_b6" step="0.001" min="0"  placeholder="Vitamine B6" value="<?php echo empty($specs['vitamines'][0]['vitamine_b6'])?'':$specs['vitamines'][0]['vitamine_b6'] ?>"/><br>
		<input type="number" name="vitamine_b9" step="0.001" min="0"  placeholder="Vitamine B9" value="<?php echo empty($specs['vitamines'][0]['vitamine_b9'])?'':$specs['vitamines'][0]['vitamine_b9'] ?>"/><br>
		<input type="number" name="vitamine_b12" step="0.001" min="0"  placeholder="Vitamine B12" value="<?php echo empty($specs['vitamines'][0]['vitamine_b12'])?'':$specs['vitamines'][0]['vitamine_b12'] ?>"/><br>
		<input type="number" name="vitamine_c" step="0.001" min="0"  placeholder="Vitamine C" value="<?php echo empty($specs['vitamines'][0]['vitamine_c'])?'':$specs['vitamines'][0]['vitamine_c'] ?>"/><br>
		<input type="number" name="vitamine_d" step="0.001" min="0"  placeholder="Vitamine D" value="<?php echo empty($specs['vitamines'][0]['vitamine_d'])?'':$specs['vitamines'][0]['vitamine_d'] ?>"/><br>
		<input type="number" name="vitamine_e" step="0.001" min="0"  placeholder="Vitamine E" value="<?php echo empty($specs['vitamines'][0]['vitamine_e'])?'':$specs['vitamines'][0]['vitamine_e'] ?>"/><br>
		<input type="number" name="vitamine_k" step="0.001" min="0"  placeholder="Vitamine K" value="<?php echo empty($specs['vitamines'][0]['vitamine_k'])?'':$specs['vitamines'][0]['vitamine_k'] ?>"/><br>
		<input type="button" name="previous" class="previous action-button" value="Précédant" />
		<input type="button" name="next" class="next action-button" value="Suivant" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Mineraux pour 100g (en mg)</h2>
	    <h3 class="fs-subtitle">Ceci est l'étape 5</h3>
		<input type="number" name="sodium" step="0.001" min="0"  placeholder="Sodium" value="<?php echo empty($specs['mineraux'][0]['sodium'])?'':$specs['mineraux'][0]['sodium'] ?>"/><br>
		<input type="number" name="potassium" step="0.001" min="0"  placeholder="Potassium" value="<?php echo empty($specs['mineraux'][0]['potassium'])?'':$specs['mineraux'][0]['potassium'] ?>"/><br>
		<input type="number" name="calcium" step="0.001" min="0"  placeholder="Calcium" value="<?php echo empty($specs['mineraux'][0]['calcium'])?'':$specs['mineraux'][0]['calcium'] ?>"/><br>
		<input type="number" name="fer" step="0.001" min="0"  placeholder="Fer" value="<?php echo empty($specs['mineraux'][0]['fer'])?'':$specs['mineraux'][0]['fer'] ?>"/><br>
		<input type="number" name="magnesium" step="0.001" min="0"  placeholder="Magnesium" value="<?php echo empty($specs['mineraux'][0]['magnesium'])?'':$specs['mineraux'][0]['magnesium'] ?>"/><br>
		<input type="number" name="zinc" step="0.001" min="0"  placeholder="Zinc" value="<?php echo empty($specs['mineraux'][0]['zinc'])?'':$specs['mineraux'][0]['zinc'] ?>"/><br>
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