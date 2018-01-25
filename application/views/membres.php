<?php echo "<p>Bienvenue ".$this->user_model->get($this->session->userdata('login'))['prenom']." !</p>"; ?><br>

<?php if(isset($success)){
  echo $success;
};?>

<!-- Recherche d'un produit -->
<?php echo form_open('product/search') ?>
<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" name="search" placeholder="Quel produit recherchez-vous?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
<?php echo form_close(); ?><br>


<!-- Ajouter un produit -->
<?php echo form_open('product/create') ?>
  <button type="submit" class="buttonAdd"><span>Ajouter un produit</span></button>
<?php echo form_close(); ?>


<!-- Affichage des produits -->
<section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead><tr><th>id</th><th>Nom</th><th>Marque</th><th>Quantite</th><th>Pays</th></tr></thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        	<?php foreach ($produits as $id => $produit): ?>
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

<script>
	// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
	$(window).on("load resize ", function() {
	  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	  $('.tbl-header').css({'padding-right':scrollWidth});
	}).resize();
</script>