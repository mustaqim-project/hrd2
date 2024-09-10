<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Memanggil model karyawan
		$this->load->model('Model_upah_karyawan', 'karyawan');
		//Memanggil library validation
		$this->load->library('form_validation');
		//Memanggil library fpdf
		$this->load->library('pdf');
		//Memanggil Helper Login
		is_logged_in();
		//Memanggil Helper
		$this->load->helper('wpp');
	}
	

	//untuk mencari data karyawan berdasarkan NIK Karyawan Keluar
    public function get_datakaryawankeluarkaryawan()
    {
        $nikkaryawan = $this->input->post('nik_karyawan');
        $data = $this->karyawan->get_karyawan_bynik($nikkaryawan);
        echo json_encode($data);
    }
	

	//Menampilkan halaman awal data karyawan
	public function upah()
	{
		//Mengambil data dari session, yang sebelumnya sudah diinputkan dari dalam form login
		$data['title'] = 'Data Upah';
		//Menyimpan session dari login
		$data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		//Mengambil data karyawan, dari model, dengan di join dengan data penempatan, dan data jabatan
		$data['joinkaryawan'] = $this->karyawan->getUpah();

		//menampilkan halaman data karyawan
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('upah_karyawan/index', $data);
		$this->load->view('templates/footer');
	}
	

	//Method Tambah Data Karyawan
	public function tambahupahkaryawan() {
        // Mengambil Session
        $role_id = $this->session->userdata("role_id");

        // Jika yang login Admin, Dan Staff HRD
        if ($role_id == 1 || $role_id == 11) {
            // Data untuk halaman
            $data['title'] = 'Tambah Upah Karyawan';
            $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

            // Validation Form Input
            $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
            $this->form_validation->set_rules('uang_kehadiran', 'Uang Kehadiran', 'required|decimal');
            $this->form_validation->set_rules('tunjangan_jabatan', 'Tunjangan Jabatan', 'required|decimal');
            $this->form_validation->set_rules('tunjangan_transportasi', 'Tunjangan Transportasi', 'required|decimal');
            $this->form_validation->set_rules('tunjangan_pot', 'Tunjangan Pot', 'required|decimal');
            $this->form_validation->set_rules('tunjangan_komunikasi', 'Tunjangan Komunikasi', 'required|decimal');
            $this->form_validation->set_rules('tunjangan_lain_lain', 'Tunjangan Lain-Lain', 'required|decimal');
            $this->form_validation->set_rules('insentif_libur_bersama', 'Insentif Libur Bersama', 'required|decimal');
            $this->form_validation->set_rules('insentif_libur_perusahaan', 'Insentif Libur Perusahaan', 'required|decimal');
            $this->form_validation->set_rules('ritase', 'Ritase', 'required|decimal');
            $this->form_validation->set_rules('dinas', 'Dinas', 'required|decimal');
            $this->form_validation->set_rules('rapelan', 'Rapelan', 'required|decimal');
            $this->form_validation->set_rules('lain_lain', 'Lain-Lain', 'required|decimal');

            if ($this->form_validation->run() == FALSE) {
                // Menampilkan halaman tambah data karyawan
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('upah_karyawan/tambah_upah_karyawan', $data);
                $this->load->view('templates/footer');
            } else {
                // Menyimpan data ke database
                $upahData = array(
                    'nama_karyawan' => $this->input->post('nama_karyawan'),
                    'uang_kehadiran' => $this->input->post('uang_kehadiran'),
                    'tunjangan_jabatan' => $this->input->post('tunjangan_jabatan'),
                    'tunjangan_transportasi' => $this->input->post('tunjangan_transportasi'),
                    'tunjangan_pot' => $this->input->post('tunjangan_pot'),
                    'tunjangan_komunikasi' => $this->input->post('tunjangan_komunikasi'),
                    'tunjangan_lain_lain' => $this->input->post('tunjangan_lain_lain'),
                    'insentif_libur_bersama' => $this->input->post('insentif_libur_bersama'),
                    'insentif_libur_perusahaan' => $this->input->post('insentif_libur_perusahaan'),
                    'ritase' => $this->input->post('ritase'),
                    'dinas' => $this->input->post('dinas'),
                    'rapelan' => $this->input->post('rapelan'),
                    'lain_lain' => $this->input->post('lain_lain'),
                );

                $this->karyawan->tambahUpahKaryawan($upahData);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Upah Karyawan berhasil ditambahkan.</div>');
                redirect('upah/karyawan');
            }
        } else {
            $this->load->view('auth/blocked');
        }
    }
	
	
	public function editupahkaryawan($id)
	{
        // Load the karyawan data by ID
        $data['title'] = 'Edit Upah Karyawan';
        $data['upah'] = $this->karyawan->getUpahKaryawanById($id);

        // Set form validation rules
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('uang_kehadiran', 'Uang Kehadiran', 'required|numeric');
        // Tambahkan rules validasi untuk semua field lainnya

        if ($this->form_validation->run() == false) {
            // Load view jika validasi gagal
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('upah_karyawan/edit_upah_karyawan', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, panggil fungsi update data
            $this->karyawan->updateUpahKaryawan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data upah karyawan berhasil diperbarui!</div>');
            redirect('upah/upah'); // Redirect kembali ke halaman utama
        }
    }



	//Method Hapus Data Karyawan
	public function hapusupahkaryawan($id)
	{
		// Get session data
		$role_id = $this->session->userdata("role_id");

		// Check if the user is an Admin or HRD Staff
		if ($role_id == 1 || $role_id == 11) {

			// Call the model method to delete the employee data based on ID
			if ($this->karyawan->hapusupahkaryawan($id)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Delete Data Upah Karyawan</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to Delete Data Upah Karyawan</div>');
			}
			// Redirect to the employee data page
			redirect('upah/karyawan');
		} else {
			// Show blocked view if user is not authorized
			$this->load->view('auth/blocked');
		}
	}

	//Menampilkan halaman lihat data karyawan
	public function lihatupahkaryawan($id)
	{
		// Mengambil data dari session, yang sebelumnya sudah diinputkan dari dalam form login
		$data['title'] = 'Lihat Data Upah Karyawan';
		// Menyimpan session dari login
		$data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		// Mengambil data karyawan, dari model, dengan di join dari berbagai table
		$data['karyawan'] = $this->karyawan->getUpah2($id); // Pass the $id to getUpah()

		// Menampilkan halaman data karyawan
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('upah_karyawan/lihat_upah_karyawan', $data);
		$this->load->view('templates/footer');
	}
	public function downloadpdf()
    {
        // Fetch data from model
        $data['upah_karyawan'] = $this->karyawan->getAllUpah();

        // Load the view into a PDF
        $this->load->view('upah_karyawan/download_pdf', $data);
    }
	public function downloadExcel()
    {
        // Fetch data from model
        $data = $this->karyawan->getAllUpah();

        // Initialize Excel
        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama Karyawan');
        $sheet->setCellValue('C1', 'Uang Kehadiran');
        $sheet->setCellValue('D1', 'Tunjangan Jabatan');
        $sheet->setCellValue('E1', 'Tunjangan Transportasi');
        // Add more columns as needed...

        // Add the data
        $row = 2; // Start from row 2
        foreach ($data as $upah) {
            $sheet->setCellValue('A' . $row, $upah['id']);
            $sheet->setCellValue('B' . $row, $upah['nama_karyawan']);
            $sheet->setCellValue('C' . $row, $upah['uang_kehadiran']);
            $sheet->setCellValue('D' . $row, $upah['tunjangan_jabatan']);
            $sheet->setCellValue('E' . $row, $upah['tunjangan_transportasi']);
            // Add more fields as needed...
            $row++;
        }

        // Set file name
        $filename = 'Upah_Karyawan_' . date('Ymd') . '.xlsx';

        // Set header to force download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the file to output
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
    }
}
