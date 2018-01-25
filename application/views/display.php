<p>Fiche du produit <?php echo $infos['prod'][0]['nom'];?>.</p>

<!-- Supprimer produit -->
<?php echo form_open('product/delete/'.$infos['prod'][0]['id']) ?>
  <button type="submit" class="buttonAdd" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce produit?'));"><span>Supprimer le produit</span></button>
<?php echo form_close(); ?>

<!-- Modifier produit -->
<?php echo form_open('product/edit/'.$infos['prod'][0]['id']) ?>
  <button type="submit" class="buttonAdd" ><span>Modifier le produit</span></button>
<?php echo form_close(); ?>

<!-- Infos basiques -->
<?php
foreach ($infos['prod'][0] as $index=>$content) {
  if(!empty($content) && $index!='id')
    echo "<p>".$content."</p>";
}

if(!empty($infos['categories'])){
  echo "<p>Categories : "; $i=0;
  foreach ($infos['categories'] as $array) {
    if($i!=0) echo ", ";
    echo $array['categorie'];
    $i++;
  }
  echo ".</p>";
}

if(!empty($infos['pays'])){
  echo "<p>Pays : "; $i=0;
  foreach ($infos['pays'] as $array) {
    if($i!=0) echo ", ";
    echo $array['pays'];
    $i++;
  }
  echo ".</p>";
}

if(!empty($infos['ingredients'])){
  echo "<p>Liste des ingredients : "; $i=0;
  foreach ($infos['ingredients'] as $array) {
    if($i!=0) echo ", ";
    echo $array['ingredient'];
    $i++;
  }
  echo ".</p>";
}

if(!empty($infos['additifs'])){
  echo "<p>Liste des additifs : "; $i=0;
  foreach ($infos['additifs'] as $array) {
    if($i!=0) echo ", ";
    echo $array['additif'];
    $i++;
  }
  echo ".</p>";
}
?>

<!-- Affichage des specificités -->
<?php foreach ($specs as $table => $content): ?>
  <?php if(!empty($content)): ?>
    <section>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead><tr><th>Composition</th><th>Quantité</th></tr></thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            	<?php
                foreach($specs[$table][0] as $att=>$val) {
                  if($att!='id'){
                    echo "<tr>";
                      echo "<td>".$att."</td>";
                      echo "<td>".$val."</td>";
                    echo "</tr>";
                  }
                }
      		    ?>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  <?php endif; ?>
<?php endforeach; ?>


<!-- Boutons -->
<p class='retour'><?php echo anchor('user/membres','Retour'); ?></p>