<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Memanggil model karyawan
        $this->load->model('Klaim_karyawan_model', 'klaim');
        //Memanggil library validation
        $this->load->library('form_validation');
        //Memanggil Helper Login
        is_logged_in();
    }

    //Menampilkan halaman awal data klaim karyawan
    public function index()
    {
        $data['title'] = 'Klaim Data Karyawan';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['klaim_karyawan'] = $this->klaim->get_klaim();

        //menampilkan halaman data klaim karyawan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('klaim_karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    //Menampilkan form tambah klaim karyawan
    public function form_tambah_klaim()
    {
        $data['title'] = 'Tambah Klaim Karyawan';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        // Dropdown Kategori
        $data['kategori_options'] = [
            'Reimburse Keperluan Operasional',
            'Reimburse Perjalanan Dinas',
            'Reimburse Administrasi'
        ];

        //menampilkan halaman tambah data klaim
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('klaim_karyawan/tambah_klaim_karyawan', $data);
        $this->load->view('templates/footer');
    }

    //Aksi tambah klaim karyawan (proses penyimpanan data)
    public function aksi_tambah_klaim()
    {
        // Aturan validasi form
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('jumlah_nominal', 'Jumlah Nominal', 'required|decimal');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form tambah klaim
            $this->form_tambah_klaim();
        } else {
            // Menyimpan data ke database
            $klaimData = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'lokasi_kerja' => $this->input->post('lokasi_kerja'),
                'tujuan_alasan' => $this->input->post('tujuan_alasan'),
                'kategori' => $this->input->post('kategori'),
                'tgl_pelaksanaan' => $this->input->post('tgl_pelaksanaan'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'jumlah_nominal' => $this->input->post('jumlah_nominal'),
                'no_rek' => $this->input->post('no_rek'),
                'nama_bank' => $this->input->post('nama_bank'),
                'atas_nama' => $this->input->post('atas_nama')
            );

            if ($this->klaim->tambah_klaim_karyawan($klaimData)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data Klaim Karyawan berhasil ditambahkan.</div>');
                redirect('klaim/index');
            } else {
                log_message('error', 'Failed to insert klaim data');
                show_error('Terjadi kesalahan saat menyimpan data ke database. Silakan coba lagi.', 500, 'Error');
            }
        }
    }
	public function editKlaimKaryawan($id)
{
    // Mengambil data klaim karyawan berdasarkan ID
    $data['title'] = 'Edit Klaim Karyawan';
    $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
    $data['klaim'] = $this->klaim->getKlaimById($id);

    // Dropdown Kategori
    $data['kategori_options'] = [
        'Reimburse Keperluan Operasional',
        'Reimburse Perjalanan Dinas',
        'Reimburse Administrasi'
    ];

    // Validasi form
    $this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
    $this->form_validation->set_rules('jumlah_nominal', 'Jumlah Nominal', 'required|decimal');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan form edit kembali
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('klaim_karyawan/edit_klaim_karyawan', $data);
        $this->load->view('templates/footer');
    } else {
        // Update klaim karyawan
        $klaimData = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'lokasi_kerja' => $this->input->post('lokasi_kerja'),
            'tujuan_alasan' => $this->input->post('tujuan_alasan'),
            'kategori' => $this->input->post('kategori'),
            'tgl_pelaksanaan' => $this->input->post('tgl_pelaksanaan'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'jumlah_nominal' => $this->input->post('jumlah_nominal'),
            'no_rek' => $this->input->post('no_rek'),
            'nama_bank' => $this->input->post('nama_bank'),
            'atas_nama' => $this->input->post('atas_nama')
        );

        // Memanggil model untuk update klaim
        $this->klaim->updateKlaimKaryawan($id, $klaimData);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data klaim karyawan berhasil diperbarui!</div>');
        redirect('klaim/index');
    }
}
	public function hapusKlaimKaryawan($id)
	{
		// Get session data
		$role_id = $this->session->userdata("role_id");

		// Check if the user is an Admin or HRD Staff
		if ($role_id == 1 || $role_id == 11) {
			// Call the model method to delete the klaim karyawan data based on ID
			if ($this->klaim->hapusKlaimKaryawan($id)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data klaim karyawan berhasil dihapus.</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data klaim karyawan.</div>');
			}
			// Redirect to the klaim karyawan page
			redirect('klaim/index');
		} else {
			// Show blocked view if user is not authorized
			$this->load->view('auth/blocked');
		}
	}

}