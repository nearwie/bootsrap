<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
        $this->load->helper('form');
        
        $this->load->model('Entry_model', 'entrym');
        $this->load->library('form_validation');

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

	}


	public function index()
	{
		$data['title'] = 'Entry Log-Book';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		 $this->load->library('session');
          $data['entrydt'] = $this->entrym->getEntryLog();
         

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('entry/data_entry', $data);
		$this->load->view('templates/footer', $data);
		
	}




	public function add_entry()
    {
       
       
        
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
			'required' => 'Tanggal wajib diisi'
		]);
		$this->form_validation->set_rules('jenis_pkj', 'Jenis Pekerjaan', 'required', [
			'required' => 'Jenis Pekerjaan wajib diisi' 
		]);
		$this->form_validation->set_rules('jadwal_dns', 'Jadwal Dinas', 'required', [
			'required' => 'Jadwal Dinas wajib diisi'
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
			'required' => 'Uraian Kegiatan wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Entry Log-Book';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

       		  $data['barangs'] = $this->entrym->get('barang', null);
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('entry/add_entry', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->entrym->insert('entry_log', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('barang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('barang/tambah');
            }
        }
    }
        


	



	
}