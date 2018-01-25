<?php
class Product_model extends CI_Model {
	public function __construct(){
	}

	//Obtenir produits
	public function gets(){
		return $this->db->select('*')->from('_produit')->join('_produit_pays','_produit.id=_produit_pays.id')->order_by('_produit.id', 'DESC')->limit(100)->get()->result_array();
	}

	//Obtenir un produit
	public function get($id){
		return $this->db->select('*')->from('_produit')->join('_produit_pays','_produit.id=_produit_pays.id')->where('id',$id)->get()->result_array();
	}
	public function getSpecs($id){
		$res['valeurs']=$this->db->select('*')->from('_produit_valeurs_nutritionelles')->where('id',$id)->get()->result_array();
		$res['vitamines']=$this->db->select('*')->from('_produit_vitamines')->where('id',$id)->get()->result_array();
		$res['mineraux']=$this->db->select('*')->from('_produit_mineraux')->where('id',$id)->get()->result_array();
		return $res;
	}
	public function getInfos($id){
		$res['prod']=$this->db->select('*')->from('_produit')->where('id',$id)->get()->result_array();
		$res['categories']=$this->db->select('*')->from('_produit_categories')->where('id',$id)->get()->result_array();
		$res['pays']=$this->db->select('*')->from('_produit_pays')->where('id',$id)->get()->result_array();
		$res['ingredients']=$this->db->select('*')->from('_produit_ingredients')->where('id',$id)->get()->result_array();
		$res['additifs']=$this->db->select('*')->from('_produit_additifs')->where('id',$id)->get()->result_array();
		return $res;
	}

	//Ajouter un produit
	public function add($nom,$marque,$quantite,$pays,$categories,$ingredients,$additifs,$nutriscore,$energy,$glucides,$sucre,$lipides,$gras_sature,$proteines,$fibres,$sel,$vitamine_a,$vitamine_b1,$vitamine_b2,$vitamine_pp,$vitamine_b6,$vitamine_b9,$vitamine_b12,$vitamine_c,$vitamine_d,$vitamine_e,$vitamine_k,$sodium,$potassium,$calcium,$fer,$magnesium,$zinc){
		$this->db->insert('_produit',array('nom'=>$nom,'marque'=>$marque,'quantite'=>$quantite));
		if(!is_null($categories)){
			$categories_pieces =  explode(",", $categories);
			foreach ($categories_pieces as $piece) {
				$this->db->insert('_produit_categories',array('id'=>$this->db->insert_id(),'categorie'=>$piece));
			}
		}
		if(!is_null($pays)){
			$pays_pieces =  explode(",", $pays);
			foreach ($pays_pieces as $piece) {
				$this->db->insert('_produit_pays',array('id'=>$this->db->insert_id(),'pays'=>$piece));
			}
		}
		if(!is_null($ingredients)){
			$ingredients_pieces =  explode(",", $ingredients);
			foreach ($ingredients_pieces as $piece) {
				$this->db->insert('_produit_ingredients',array('id'=>$this->db->insert_id(),'ingredient'=>$piece));
			}
		}
		if(!is_null($additifs)){
			$additifs_pieces =  explode(",", $additifs);
			foreach ($additifs_pieces as $piece) {
				$this->db->insert('_produit_additifs',array('id'=>$this->db->insert_id(),'additif'=>$piece));
			}
		}
		if(!(is_null($nutriscore)&&is_null($energy)&&is_null($glucides)&&is_null($sucre)&&is_null($lipides)&&is_null($gras_sature)&&is_null($proteines)&&is_null($fibres)&&is_null($sel))){
			$this->db->insert('_produit_valeurs_nutritionelles',array('id'=>$this->db->insert_id(),'nutriscore'=>$nutriscore,'energy'=>$energy,'glucides'=>$glucides,'sucre'=>$sucre,'lipides'=>$lipides,'gras_sature'=>$gras_sature,'proteines'=>$proteines,'fibres'=>$fibres,'sel'=>$sel));
		}
		if(!(is_null($vitamine_a)&&is_null($vitamine_b1)&&is_null($vitamine_b2)&&is_null($vitamine_pp)&&is_null($vitamine_b6)&&is_null($vitamine_b9)&&is_null($vitamine_b12)&&is_null($vitamine_c)&&is_null($vitamine_d)&&is_null($vitamine_e)&&is_null($vitamine_k))){
			$this->db->insert('_produit_vitamines',array('id'=>$this->db->insert_id(),'vitamine_a'=>$vitamine_a,'vitamine_b1'=>$vitamine_b1,'vitamine_b2'=>$vitamine_b2,'vitamine_pp'=>$vitamine_pp,'vitamine_b6'=>$vitamine_b6,'vitamine_b9'=>$vitamine_b9,'vitamine_b12'=>$vitamine_b12,'vitamine_c'=>$vitamine_c,'vitamine_d'=>$vitamine_d,'vitamine_e'=>$vitamine_e,'vitamine_k'=>$vitamine_k));
		}
		if(!(is_null($sodium)&&is_null($potassium)&&is_null($calcium)&&is_null($fer)&&is_null($magnesium)&&is_null($zinc))){
			$this->db->insert('_produit_mineraux',array('id'=>$this->db->insert_id(),'sodium'=>$sodium,'potassium'=>$potassium,'calcium'=>$calcium,'fer'=>$fer,'magnesium'=>$magnesium,'zinc'=>$zinc));
		}
	}

	//Supprimer un produit
	public function delete($id){
        $this->db->delete('_produit_valeurs_nutritionelles',array('id'=>$id));
        $this->db->delete('_produit_vitamines',array('id'=>$id));
        $this->db->delete('_produit_mineraux',array('id'=>$id));
        $this->db->delete('_produit_additifs',array('id'=>$id));
        $this->db->delete('_produit_ingredients',array('id'=>$id));
        $this->db->delete('_produit_categories',array('id'=>$id));
        $this->db->delete('_produit_pays',array('id'=>$id));
		$this->db->delete('_produit',array('id'=>$id));
		redirect('user/membres');
	}

	//Rechercher un produit
	public function search($stm){
        $keyword = explode(" ",$stm);
        $query2=[];
        foreach($keyword as $key){
            $query=$this->db->select('*')->from('_produit')->join('_produit_pays','_produit.id=_produit_pays.id')->like('LOWER(nom)',strtolower($key))->order_by('_produit.id', 'DESC')->get()->result_array();
            $query2=array_merge($query,$query2);
        }
        return $query2;
	}
}
?>
