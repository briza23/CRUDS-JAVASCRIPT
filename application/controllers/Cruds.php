<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cruds extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cruds_model');
    }
	public function index()
	{
		$data['members'] = $this->Cruds_model->get_all_member();
		$this->load->view('cruds',$data);
	}
	public function add(){
		$data =  array(
			'first_name' =>  $_POST['first_name'],
			'last_name'  =>  $_POST['last_name'],
			'email' 	 =>  $_POST['email'],
			'position'   =>  $_POST['position'],
		);
		$this->Cruds_model->add($data);
		echo json_encode($data);
	}
	public function update(){
		$id = $_POST['id'];
		$data =  array(
			'first_name' =>  $_POST['first_name'],
			'last_name'  =>  $_POST['last_name'],
			'email' 	 =>  $_POST['email'],
			'position'   =>  $_POST['position'],
		);
		$this->Cruds_model->update($id,$data);
		echo json_encode($data);
	}
	public function delete(){
		$id = $_POST['id'];
		$this->Cruds_model->delete($id);
	}
	public function search(){
		
	}
}
