<?php
class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('login') || $this->session->userdata('logged')){
			redirect('user/membres');
		}
		redirect(site_url());
	}

	//Rechercher
	public function search(){
		$data['content']='search';
		$data['search']=$this->product_model->search($this->input->post('search'));
		$data['nbres']=count($data['search']);
		$this->load->vars($data);
		$this->load->view('template');
	}

	//Consulter
	public function display($id){
		$data['content']='display';
		$data['specs']=$this->product_model->getSpecs($id);
		$data['infos']=$this->product_model->getInfos($id);
		$this->load->vars($data);
		$this->load->view('template');
	}

	//Supprimer
	public function delete($id){
		$this->product_model->delete($id);
	}

	//Ajouter
	public function create(){
		$data['content']='add';
		$this->form_validation->set_rules('nom','nom','trim|required|max_length[500]');
		$this->form_validation->set_rules('marque','marque','trim|max_length[200]');
		$this->form_validation->set_rules('quantite','quantite','trim|max_length[50]');
		$this->form_validation->set_rules('pays','pays','trim|max_length[50]');

		$this->form_validation->set_rules('nutriscore','nutriscore','trim|max_length[1]|alpha');
		$this->form_validation->set_rules('energy','energy','trim|callback_weight_check');
		$this->form_validation->set_rules('glucides','glucides','trim|callback_weight_check');
		$this->form_validation->set_rules('sucre','sucre','trim|callback_weight_check');
		$this->form_validation->set_rules('lipides','lipides','trim|callback_weight_check');
		$this->form_validation->set_rules('gras_sature','gras_sature','trim|callback_weight_check');
		$this->form_validation->set_rules('proteines','proteines','trim|callback_weight_check');
		$this->form_validation->set_rules('fibres','fibres','trim|callback_weight_check');
		$this->form_validation->set_rules('sel','sel','trim|callback_weight_check');

		$this->form_validation->set_rules('vitamine_a','vitamine_a','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b1','vitamine_b1','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b2','vitamine_b2','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_pp','vitamine_pp','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b6','vitamine_b6','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b9','vitamine_b9','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b12','vitamine_b12','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_c','vitamine_c','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_d','vitamine_d','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_e','vitamine_e','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_k','vitamine_k','trim|callback_weight_check');

		$this->form_validation->set_rules('sodium','sodium','trim|callback_weight_check');
		$this->form_validation->set_rules('potassium','potassium','trim|callback_weight_check');
		$this->form_validation->set_rules('calcium','calcium','trim|callback_weight_check');
		$this->form_validation->set_rules('fer','fer','trim|callback_weight_check');
		$this->form_validation->set_rules('magnesium','magnesium','trim|callback_weight_check');
		$this->form_validation->set_rules('zinc','zinc','trim|callback_weight_check');
		
		if ($this->form_validation->run()){
			$nom=$this->input->post('nom');
			$marque=empty($this->input->post('marque')) ? NULL : $this->input->post('marque');
			$quantite=empty($this->input->post('quantite')) ? NULL : $this->input->post('quantite');
			$pays=empty($this->input->post('pays')) ? NULL : $this->input->post('pays');
			$categories=empty($this->input->post('categories')) ? NULL : $this->input->post('categories');

			$ingredients=empty($this->input->post('ingredients')) ? NULL : $this->input->post('ingredients');
			$additifs=empty($this->input->post('additifs')) ? NULL : $this->input->post('additifs');

			$nutriscore=empty($this->input->post('nutriscore')) ? NULL : $this->input->post('nutriscore');
			$energy=empty($this->input->post('energy')) ? NULL : $this->input->post('energy');
			$glucides=empty($this->input->post('glucides')) ? NULL : $this->input->post('glucides');
			$sucre=empty($this->input->post('sucre')) ? NULL : $this->input->post('sucre');
			$lipides=empty($this->input->post('lipides')) ? NULL : $this->input->post('lipides');
			$gras_sature=empty($this->input->post('gras_sature')) ? NULL : $this->input->post('gras_sature');
			$proteines=empty($this->input->post('proteines')) ? NULL : $this->input->post('proteines');
			$fibres=empty($this->input->post('fibres')) ? NULL : $this->input->post('fibres');
			$sel=empty($this->input->post('sel')) ? NULL : $this->input->post('sel');

			$vitamine_a=empty($this->input->post('vitamine_a')) ? NULL : $this->input->post('vitamine_a');
			$vitamine_b1=empty($this->input->post('vitamine_b1')) ? NULL : $this->input->post('vitamine_b1');
			$vitamine_b2=empty($this->input->post('vitamine_b2')) ? NULL : $this->input->post('vitamine_b2');
			$vitamine_pp=empty($this->input->post('vitamine_pp')) ? NULL : $this->input->post('vitamine_pp');
			$vitamine_b6=empty($this->input->post('vitamine_b6')) ? NULL : $this->input->post('vitamine_b6');
			$vitamine_b9=empty($this->input->post('vitamine_b9')) ? NULL : $this->input->post('vitamine_b9');
			$vitamine_b12=empty($this->input->post('vitamine_b12')) ? NULL : $this->input->post('vitamine_b12');
			$vitamine_c=empty($this->input->post('vitamine_c')) ? NULL : $this->input->post('vitamine_c');
			$vitamine_d=empty($this->input->post('vitamine_d')) ? NULL : $this->input->post('vitamine_d');
			$vitamine_e=empty($this->input->post('vitamine_e')) ? NULL : $this->input->post('vitamine_e');
			$vitamine_k=empty($this->input->post('vitamine_k')) ? NULL : $this->input->post('vitamine_k');

			$sodium=empty($this->input->post('sodium')) ? NULL : $this->input->post('sodium');
			$potassium=empty($this->input->post('potassium')) ? NULL : $this->input->post('potassium');
			$calcium=empty($this->input->post('calcium')) ? NULL : $this->input->post('calcium');
			$fer=empty($this->input->post('fer')) ? NULL : $this->input->post('fer');
			$magnesium=empty($this->input->post('magnesium')) ? NULL : $this->input->post('magnesium');
			$zinc=empty($this->input->post('zinc')) ? NULL : $this->input->post('zinc');

			$this->product_model->add($nom,$marque,$quantite,$pays,$categories,$ingredients,$additifs,$nutriscore,$energy,$glucides,$sucre,$lipides,$gras_sature,$proteines,$fibres,$sel,$vitamine_a,$vitamine_b1,$vitamine_b2,$vitamine_pp,$vitamine_b6,$vitamine_b9,$vitamine_b12,$vitamine_c,$vitamine_d,$vitamine_e,$vitamine_k,$sodium,$potassium,$calcium,$fer,$magnesium,$zinc);
			$data['success']='Produit ajouté avec succès !';
			redirect('user/membres');
		}
		$this->load->vars($data);
		$this->load->view('template');
	}
    
    //Modifier
	public function edit($id){
		$data['content']='edit';
        $data['specs']=$this->product_model->getSpecs($id);
		$data['infos']=$this->product_model->getInfos($id);
        
		$this->form_validation->set_rules('nom','nom','trim|required|max_length[500]');
		$this->form_validation->set_rules('marque','marque','trim|max_length[200]');
		$this->form_validation->set_rules('quantite','quantite','trim|max_length[50]');
		$this->form_validation->set_rules('pays','pays','trim|max_length[50]');

		$this->form_validation->set_rules('nutriscore','nutriscore','trim|max_length[1]|alpha');
		$this->form_validation->set_rules('energy','energy','trim|callback_weight_check');
		$this->form_validation->set_rules('glucides','glucides','trim|callback_weight_check');
		$this->form_validation->set_rules('sucre','sucre','trim|callback_weight_check');
		$this->form_validation->set_rules('lipides','lipides','trim|callback_weight_check');
		$this->form_validation->set_rules('gras_sature','gras_sature','trim|callback_weight_check');
		$this->form_validation->set_rules('proteines','proteines','trim|callback_weight_check');
		$this->form_validation->set_rules('fibres','fibres','trim|callback_weight_check');
		$this->form_validation->set_rules('sel','sel','trim|callback_weight_check');

		$this->form_validation->set_rules('vitamine_a','vitamine_a','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b1','vitamine_b1','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b2','vitamine_b2','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_pp','vitamine_pp','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b6','vitamine_b6','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b9','vitamine_b9','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_b12','vitamine_b12','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_c','vitamine_c','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_d','vitamine_d','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_e','vitamine_e','trim|callback_weight_check');
		$this->form_validation->set_rules('vitamine_k','vitamine_k','trim|callback_weight_check');

		$this->form_validation->set_rules('sodium','sodium','trim|callback_weight_check');
		$this->form_validation->set_rules('potassium','potassium','trim|callback_weight_check');
		$this->form_validation->set_rules('calcium','calcium','trim|callback_weight_check');
		$this->form_validation->set_rules('fer','fer','trim|callback_weight_check');
		$this->form_validation->set_rules('magnesium','magnesium','trim|callback_weight_check');
		$this->form_validation->set_rules('zinc','zinc','trim|callback_weight_check');
		
		if ($this->form_validation->run()){
			$nom=$this->input->post('nom');
			$marque=empty($this->input->post('marque')) ? NULL : $this->input->post('marque');
			$quantite=empty($this->input->post('quantite')) ? NULL : $this->input->post('quantite');
			$pays=empty($this->input->post('pays')) ? NULL : $this->input->post('pays');
			$categories=empty($this->input->post('categories')) ? NULL : $this->input->post('categories');

			$ingredients=empty($this->input->post('ingredients')) ? NULL : $this->input->post('ingredients');
			$additifs=empty($this->input->post('additifs')) ? NULL : $this->input->post('additifs');

			$nutriscore=empty($this->input->post('nutriscore')) ? NULL : $this->input->post('nutriscore');
			$energy=empty($this->input->post('energy')) ? NULL : $this->input->post('energy');
			$glucides=empty($this->input->post('glucides')) ? NULL : $this->input->post('glucides');
			$sucre=empty($this->input->post('sucre')) ? NULL : $this->input->post('sucre');
			$lipides=empty($this->input->post('lipides')) ? NULL : $this->input->post('lipides');
			$gras_sature=empty($this->input->post('gras_sature')) ? NULL : $this->input->post('gras_sature');
			$proteines=empty($this->input->post('proteines')) ? NULL : $this->input->post('proteines');
			$fibres=empty($this->input->post('fibres')) ? NULL : $this->input->post('fibres');
			$sel=empty($this->input->post('sel')) ? NULL : $this->input->post('sel');

			$vitamine_a=empty($this->input->post('vitamine_a')) ? NULL : $this->input->post('vitamine_a');
			$vitamine_b1=empty($this->input->post('vitamine_b1')) ? NULL : $this->input->post('vitamine_b1');
			$vitamine_b2=empty($this->input->post('vitamine_b2')) ? NULL : $this->input->post('vitamine_b2');
			$vitamine_pp=empty($this->input->post('vitamine_pp')) ? NULL : $this->input->post('vitamine_pp');
			$vitamine_b6=empty($this->input->post('vitamine_b6')) ? NULL : $this->input->post('vitamine_b6');
			$vitamine_b9=empty($this->input->post('vitamine_b9')) ? NULL : $this->input->post('vitamine_b9');
			$vitamine_b12=empty($this->input->post('vitamine_b12')) ? NULL : $this->input->post('vitamine_b12');
			$vitamine_c=empty($this->input->post('vitamine_c')) ? NULL : $this->input->post('vitamine_c');
			$vitamine_d=empty($this->input->post('vitamine_d')) ? NULL : $this->input->post('vitamine_d');
			$vitamine_e=empty($this->input->post('vitamine_e')) ? NULL : $this->input->post('vitamine_e');
			$vitamine_k=empty($this->input->post('vitamine_k')) ? NULL : $this->input->post('vitamine_k');

			$sodium=empty($this->input->post('sodium')) ? NULL : $this->input->post('sodium');
			$potassium=empty($this->input->post('potassium')) ? NULL : $this->input->post('potassium');
			$calcium=empty($this->input->post('calcium')) ? NULL : $this->input->post('calcium');
			$fer=empty($this->input->post('fer')) ? NULL : $this->input->post('fer');
			$magnesium=empty($this->input->post('magnesium')) ? NULL : $this->input->post('magnesium');
			$zinc=empty($this->input->post('zinc')) ? NULL : $this->input->post('zinc');

			$this->product_model->add($nom,$marque,$quantite,$pays,$categories,$ingredients,$additifs,$nutriscore,$energy,$glucides,$sucre,$lipides,$gras_sature,$proteines,$fibres,$sel,$vitamine_a,$vitamine_b1,$vitamine_b2,$vitamine_pp,$vitamine_b6,$vitamine_b9,$vitamine_b12,$vitamine_c,$vitamine_d,$vitamine_e,$vitamine_k,$sodium,$potassium,$calcium,$fer,$magnesium,$zinc);
			$data['success']='Produit modifié avec succès !';
			redirect('user/membres');
		}
		$this->load->vars($data);
		$this->load->view('template');
	}
    
	//fonction de callback
	public function weight_check($val){
        if (!is_numeric($val) && !empty($val)) {
            $this->form_validation->set_message('weight_check', 'The {field} field must be number or decimal ('.$val.').');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
?>
