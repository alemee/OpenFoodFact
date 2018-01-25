<?php
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	//Si l'utilisateur est deje connecté, on le redirige vers OPFOFA
	public function index(){
		if($this->session->userdata('login') || $this->session->userdata('logged')){
			redirect('user/membres');
		}
		$this->signup();
	}

	//Inscription d'un nouvel utilisateur
	public function signup(){
		$data['title']='Inscription';
		$data['content']='signup';
		$this->form_validation->set_rules('prenom','Prenom','trim|required|max_length[30]');
		$this->form_validation->set_rules('nom','Nom','trim|required|max_length[30]');
        $this->form_validation->set_rules('pass','Password','trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('passconf','Password Confirmation','trim|required|min_length[5]|max_length[20]|matches[pass]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email|max_length[40]');
        $this->form_validation->set_rules('pays','Pays','trim|required');

        if ($this->form_validation->run()){
			$prenom=$this->input->post('prenom');
			$nom=$this->input->post('nom');
			$pass=$this->input->post('pass');
			$email=$this->input->post('email');
			$pays=$this->input->post('pays');
			$this->user_model->add($prenom,$nom,$pass,$email,$pays);
			$data['success']='Inscription réussie';
			redirect('user/signin');
		}
		$this->load->vars($data);
		$this->load->view('template');
	}

	//Connexion
	public function signin(){
		if($this->session->userdata('login') || $this->session->userdata('logged')){
			redirect('user/membres');
		}
		$data['title']='Connexion';
		$data['content']='signin';
		$this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('pass','pass','trim|required');

		if ($this->form_validation->run()){
			if($this->user_model->check_signin($this->input->post('email'),$this->input->post('pass'))){
				$data = array('login'=>$this->input->post('email'), 'logged'=>true);
				$this->session->set_userdata($data);
				redirect('user/membres');
			}else{
				$data['error']='Mauvais identifiants';
			}
		}
		$this->load->vars($data);
		$this->load->view('template');
	}

	//Deconnexion
	public function signout(){
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		redirect(site_url());
	}
    
    //Fermer son compte
    public function delete(){
		$this->user_model->delete($this->session->userdata('login')); //On passe l'email (unique)
		$this->signout();
	}

	//Espace OPFOFA
	public function membres(){
		if(!$this->session->userdata('login') || !$this->session->userdata('logged')){
			redirect(site_url());
		}else{
			$data['content']='membres';
			$data['produits']=$this->product_model->gets();
			$this->load->vars($data);
			$this->load->view('template');
		}
	}


	//fonction  de callback
	public function check_email(){
		if($this->input->post('email')){
			$this->db->select('email');
			$this->db->from('_user');
			$this->db->where('email',$this->input->post('email'));
			if($this->db->count_all_results()>0){
				$this->form_validation->set_message('check_email','Cet email est déjà utilisé');
				return false;
			}else{
				return true;
			}
		}
	}
}
?>