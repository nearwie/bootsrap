.<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	private $array_barang = [];

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Transaksi_model');
		//$this->load->model('leave_model');
	}



	public function index ()
	{	
		$data['title'] = 'List transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		 $transaksi = $this->Transaksi_model->get_all()->result();
        foreach ($transaksi as $key => $value) 
        {
            $transaksi[$key]->obat = $this->Transaksi_model->get_obat($value->id)->result();
        }
        $data['transaksi'] = $transaksi;
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/transaksi_form', $data);
		$this->load->view('templates/footer', $data);

	}

	public function tambah()
    {

    	$data['title'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->model('Barang_model');
        $data['barang'] = $this->Barang_model->get_all();
      
       
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('templates/footer', $data);

    }


     public function store()
    {
        
        $this->form_validation->set_rules('data_barang', 'Barang', 'callback__data_barang_check');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">form error</div>');

            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/transaksi', $data);
			$this->load->view('templates/footer', $data);
            
        } 
        else {
        $data_transaksi = [
            'tgl' => date('Y-m-d h:i:s'),
            'user_id' => $this->session->userdata('name'),
        ];

        $this->db->insert('transaksi', $data_transaksi);
        $transaksi_id = $this->db->insert_id();

        $detail_transaksi = [];
        foreach ($this->array_barang as $key => $ob) {
            $detail_transaksi[$key] = [
                'transaksi_id' => $transaksi_id,
                'kode_brg' => $ob->kode_brg,
                'jumlah' => $ob->jumlah,
            ];
        }

         $this->Transaksi_model->create_detail($detail_transaksi);
      
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $response = [
            'status' => true,
            'message' => $msg,
        ];
        echo json_encode($response);
        return;
        }
    }


    public function _data_barang_check($value)
    {
        $this->array_barang = json_decode($value);
        if (empty($this->array_barang)) 
        {
            $this->form_validation->set_message('_data_barang_check', 'The {field} can not be empty');
            return false;
        }
        foreach ($this->array_barang as $ob) 
        {
            $barang = $this->db->get_where('tbl_barang', ['kode_brg' => $ob->kode_brg])->row();
            if (! $barang) 
            {
                $this->form_validation->set_message('_data_barang_check', 'Data {field} tidak ditemukan');
                return false;
            }
            if ((int)$barang->stok < $ob->jumlah) 
            {
                $this->form_validation->set_message('_data_barang_check', "Gagal!, Stok {$barang->nama_brg} tersisa {$barang->stok} anda menginput {$ob->jumlah}");
                return false;
            }
        }
        return true;
    }


    public function hapus($id = null)
    {
        if (! $id) return show_404();
        $this->db->delete('transaksi', ['id' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('transaksi');
    }

    




	

}