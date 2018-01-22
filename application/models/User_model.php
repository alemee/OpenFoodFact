<?php
class User_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//Obtenir utilisateur
	public function get($email){
		return $this->db->select('*')->from('_user')->where('email',$email)->get()->result_array()[0];
	}

	//Ajout d'un utilisateur
	public function add($prenom,$nom,$pass,$email,$pays){
		$data=array('prenom'=>$prenom, 'nom'=>$nom, 'pass'=>$pass, 'email'=>$email, 'pays'=>$pays);
		return $this->db->insert('_user',$data);
	}

	//Suppression d'un utilisateur
	public function delete($email){
		$this->db->delete('_user',array('email'=>$email));
	}

	//L'utilisateur est-il déjà connecté ?
	public function check_signin($email,$pass){
		$this->db->where('email',$email);
		$this->db->where('pass',$pass);
		if($this->db->get('_user')->num_rows()>0){
			return true;
		}
	}
}
?>
