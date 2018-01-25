<p>Nous avons trouvé <?php echo $nbres; if($nbres>1)echo " resultats"; else echo " resultat"; ?></p>

<!-- Affichage des resultats -->
<section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead><tr><th>id</th><th>Nom</th><th>Marque</th><th>Quantite</th><th>Pays</th></tr></thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        	<?php foreach ($search as $produit): ?>
          		<tr onclick="document.location='<?php echo base_url();?>index.php/product/display/<?php echo $produit['id'];?>'">
        			<td><?php echo anchor('product/display/'.$produit['id'],$produit['id']); ?></td>
       				<td><?php echo $produit['nom'] ?></td>
      				<td><?php echo $produit['marque'] ?></td>
          			<td><?php echo $produit['quantite'] ?></td>
          			<td><?php echo $produit['pays'] ?></td>
        		</tr>
            <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>


<!-- Boutons -->
<p class='retour'><?php echo anchor('user/membres','Retour'); ?></p>