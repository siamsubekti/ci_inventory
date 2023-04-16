<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Inventory";
        $data['inventory'] = $this->admin->getInventory();
        $this->template->load('templates/dashboard', 'inventory/data', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Inventory';

        //menampilkan data berdasarkan id
        $data['data'] = $this->barang_model->detail_join($id, 'inventory')->result();

        $this->template->load('templates/dashboard', 'inventory/data', $data);
    }
    private function _validasi()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim');
		$this->form_validation->set_rules('serial_number', 'Serial Number', 'required|trim');
		$this->form_validation->set_rules('no_invoice', 'Np Invoice', 'required|trim');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
        $this->form_validation->set_rules('gudang_id', 'Gudang', 'required');
    }
     private function _config()
    {
        $config['upload_path']      = "./assets/upload";
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = '2048';
        $config['file_name']         = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);
    }
    public function add()
    {
        $this->_validasi();
        $this->_config();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Inventory";
			$data['status'] = $this->admin->get('status');
            $data['satuan'] = $this->admin->get('satuan');
            $data['gudang'] = $this->admin->get('gudang');
			$data['kondisi'] = $this->admin->get('kondisi');
			$data['satuan'] = $this->admin->get('satuan');
            // Mengenerate ID Inventory
            $kode_terakhir = $this->admin->getMax('inventory', 'id_inventory');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_inventory'] = 'B' . $number;

            $this->template->load('templates/dashboard', 'inventory/add', $data);
        } else {
			$input = $this->input->post(null, true);
			$insert = $this->admin->insert('inventory', $input);
            if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('Succes','Data Berhasil Disimpan');
				redirect('inventory');
			   } else {
				  $error = $this->upload->display_errors();
				  $this->session->set_flashdata('error', $error);
				   redirect('inventory/add');
			   }
        }
    }


    public function edit($getId)
    {  
        $id = encode_php_tags($getId);
        $this->_validasi();
        $this->_config();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Inventory";
			$data['status'] = $this->admin->get('status');
            $data['satuan'] = $this->admin->get('satuan');
            $data['gudang'] = $this->admin->get('gudang');
			$data['kondisi'] = $this->admin->get('kondisi');
			$data['satuan'] = $this->admin->get('satuan');
            $data['inventory'] = $this->admin->get('inventory', ['id_inventory' => $id]);
            $this->template->load('templates/dashboard', 'inventory/edit', $data);
        } else {
            $input = $this->input->post(null, true);
			$update = $this->admin->update('inventory', 'id_inventory', $id, $input);
			if ($update) {
				set_pesan('perubahan berhasil disimpan.');
				redirect('inventory');
			} 
			else {
				set_pesan('gagal menyimpan perubahan');
			}
			redirect('inventory/edit'.$id);
        }
    }
    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('inventory', 'id_inventory', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('inventory');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
