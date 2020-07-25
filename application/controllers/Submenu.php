<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('submenu_model');
		//$this->load->model('leave_model');
	}


	public function index ()
	{
		$data['title'] = 'Submenu Manajemen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		$this->load->library('form_validation');
		
		
		// KIRIM DATA KE manajemen.php
		// $data['subMenu'] = $this->db->get('user_sub_menu') -> result_array();
		$this->load->model('Submenu_model');
        
       
        $data['subMenu'] = $this->submenu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required', [
			'required' => 'Nama submenu wajib diisi'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', [
			'required' => 'Menu submenu wajib diisi'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required', [
			'required' => 'URL submenu wajib diisi'
		]);
		$this->form_validation->set_rules('icon', 'Icon', 'required', [
			'required' => 'Icon submenu wajib diisi'
		]);


		if ($this->form_validation->run() == false ) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer', $data);
		} else{
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active'),
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil menambahkan submenu baru</div>');
			redirect('submenu');
		}
	}


	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('submenu');
        }
        
        $this->load->helper('url');
      
        $this->load->model('Submenu_model');
        $data['title'] = 'Edit Submenu';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
  //       $data['subMenu'] = $this->submenu_model->getSubMenu();
		// $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['sm'] = $this->submenu_model->get_submenu_by_id($id);

        $this->form_validation->set_rules('title', 'Title', 'required', [
			'required' => 'Nama submenu wajib diisi'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', [
			'required' => 'Menu submenu wajib diisi'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required', [
			'required' => 'URL submenu wajib diisi'
		]);
		$this->form_validation->set_rules('icon', 'Icon', 'required', [
			'required' => 'Icon submenu wajib diisi'
		]);
        
    
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editsmenu', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {
            $this->submenu_model->set_submenu($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit submenu</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'submenu');
        }
    }


     public function tambah()
    {
       
        $data['title'] = 'Tambah Submenu';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		

  
		$this->form_validation->set_rules('title', 'Title', 'required', [
			'required' => 'Nama submenu wajib diisi'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', [
			'required' => 'Menu submenu wajib diisi'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required', [
			'required' => 'URL submenu wajib diisi'
		]);
		$this->form_validation->set_rules('icon', 'Icon', 'required', [
			'required' => 'Icon submenu wajib diisi'
		]);
    
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/tambahsmenu', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {

        	$data = [
				
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active'),
		      
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil menambahkan submenu baru</div>');
			redirect('submenu');
        }
    }




    
    public function delete()
    {	$this->load->model('Submenu_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus submenu </div>');
        redirect( base_url() . 'submenu'); 
        }
                
        $sm = $this->submenu_model->get_submenu_by_id($id);
        
        $this->submenu_model->delete_submenu($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus submenu </div>');
        redirect( base_url() . 'submenu');        
    }


}