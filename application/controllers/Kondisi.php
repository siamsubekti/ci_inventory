<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
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
        $data['title'] = "Condition";
        $data['kondisi'] = $this->admin->get('kondisi');
        $this->template->load('templates/dashboard', 'kondisi/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_kondisi', 'Nama Kondisi', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Condition";
            $this->template->load('templates/dashboard', 'kondisi/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('kondisi', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('kondisi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kondisi/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Condition";
            $data['kondisi'] = $this->admin->get('kondisi', ['id_kondisi' => $id]);
            $this->template->load('templates/dashboard', 'kondisi/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('kondisi', 'id_kondisi', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('kondisi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kondisi/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('kondisi', 'id_kondisi', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kondisi');
    }
}
