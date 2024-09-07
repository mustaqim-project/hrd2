<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Memanggil library validation
        $this->load->library('form_validation');
        //Memanggil Helper Login
        is_logged_in();
        //Memanggil Helper
        $this->load->helper('wpp');
        //Memanggil model absensi
        $this->load->model('absensi/Absensi_model', 'absensi');
    }

    //Menampilkan halaman awal data absensi
    public function dataabsen()
    {
        //Mengambil data dari session, yang sebelumnya sudah diinputkan dari dalam form login
        $data['title'] = 'Data Absensi';
        //Menyimpan session dari login
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        //Mengambil data absensi di join dengan data karyawan 
        $data['joinabsensi'] = $this->absensi->dataabsensi();
        //Menampilkan halaman data Absensi
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/dataabsensi', $data);
        $this->load->view('templates/footer');
    }

    //Menampilkan halaman awal data absensi
    public function tambahabsensi()
    {

        //Mengambil Session
        $role_id = $this->session->userdata("role_id");
        //Jika yang login HRD
        if ($role_id == 11 || $role_id == 1) {

            //Mengambil data dari session, yang sebelumnya sudah diinputkan dari dalam form login
            $data['title'] = 'Tambah Data Absensi';
            //Menyimpan session dari login
            $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
            //Mengambil data absensi di join dengan data karyawan
            $data['joinabsensi'] = $this->absensi->dataabsensi();

            //Validation Form
            $this->form_validation->set_rules('nik_karyawan', 'NIK Karyawan', 'required|trim|min_length[16]');
            $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
            $this->form_validation->set_rules('penempatan', 'Penempatan', 'required|trim');
            $this->form_validation->set_rules('tanggal_absen', 'Tanggal Absen', 'required|trim');
            $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|trim');
            $this->form_validation->set_rules('keterangan_absen', 'Keterangan Absen', 'required|trim');

            //Jika form input ada yang salah
            if ($this->form_validation->run() == false) {
                //menampilkan halaman data absensi
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('absensi/tambahabsensi', $data);
                $this->load->view('templates/footer');
            }
            //Jika Benar
            else {

                //Validasi jika sebelumnya data sudah pernah diinput kedalam database
                $nik_karyawan = $this->input->post('nik_karyawan');
                $tanggal_absen = $this->input->post('tanggal_absen');
                $tanggal_selesai = $this->input->post('tanggal_selesai');

                $dataabsen = $this->db->get_where('absensi', ['nik_karyawan_absen' => $nik_karyawan, 'tanggal_absen =' => $tanggal_absen])->result_array();

                //Jika salah
                if ($dataabsen) {
                    //Menampilkan pesan gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Absensi Sudah Pernah Diinput Sebelumnya..!</div>');
                    //redirect ke halaman data absensi
                    redirect('absensi/dataabsen');
                }
                //Jika benar
                else {
                    //Validasi Jika tanggal selesai kurang dari tanggal absen
                    //Jika salah
                    if ($tanggal_absen > $tanggal_selesai) {
                        //Menampilkan pesan gagal
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tanggal Selesai Tidak Boleh Kurang Dari Tanggal Absen..!</div>');
                        //redirect ke halaman data absensi
                        redirect('absensi/dataabsen');
                    }
                    //Jika benar
                    else {
                        //Memanggil model absensi dengan method tambahAbsensi
                        $this->absensi->tambahAbsensi();
                        //Menampilkan pesan berhasil
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Tambah Data Absensi</div>');
                        //redirect ke halaman data absensi
                        redirect('absensi/dataabsen');
                    }
                }
            }
        }
        //Jika Yang Login Bukan HRD
        else {
            $this->load->view('auth/blocked');
        }
    }

    //untuk mencari data karyawan berdasarkan NIK Karyawan Pada Form Tambah Data Absensi
    public function get_datakaryawan()
    {
        $nikkaryawan = $this->input->post('nik_karyawan');
        $data = $this->absensi->get_karyawan_bynik($nikkaryawan);
        echo json_encode($data);
    }

    //Edit Absensi
    public function editabsensi($id_absen)
    {
        //Mengambil Session
        $role_id = $this->session->userdata("role_id");
        //Jika yang login HRD
        if ($role_id == 11 || $role_id == 1) {

            //Mengambil data dari session, yang sebelumnya sudah diinputkan dari dalam form login
            $data['title'] = 'Edit Data Absensi';
            //Menyimpan session dari login
            $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
            //Mengambil data absensi di join absensi dengan data karyawan
            $data['absensi'] = $this->absensi->getAbsensiByID($id_absen);

            //Select Option
            //untuk tipe datanya enum
            $data['keterangan_absen'] = [
                '' => 'Pilih Keterangan Absen',
                'Sakit' => 'Sakit',
                'Ijin' => 'Ijin',
                'Cuti' => 'Cuti',
                'Alpa' => 'Alpa',
                'Telat' => 'Telat'
            ];
            $data['jenis_cuti'] = [
                '' => 'Pilih Jenis Cuti',
                'Tahunan' => 'Tahunan',
                'Khusus' => 'Khusus'
            ];

            //validation
            $this->form_validation->set_rules('tanggal_absen', 'Tanggal Absen', 'required');
            $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
            $this->form_validation->set_rules('keterangan_absen', 'Keterangan Absen', 'required');

            //Jika form update ada yang salah
            if ($this->form_validation->run() == false) {
                //menampilkan halaman data absensi
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('absensi/editabsensi', $data);
                $this->load->view('templates/footer');
            }
            //Jika Benar
            else {
                //Validasi agar tanggal selesai tidak bisa mundur ke tanggal absen
                $tanggal_absen = $this->input->post('tanggal_absen');
                $tanggal_selesai = $this->input->post('tanggal_selesai');
                //Validasi Jika tanggal selesai kurang dari tanggal absen
                //Jika salah
                if ($tanggal_absen > $tanggal_selesai) {
                    //Menampilkan pesan gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tanggal Selesai Tidak Boleh Kurang Dari Tanggal Absen..!</div>');
                    //redirect ke halaman data absensi
                    redirect('absensi/dataabsen');
                }
                //Jika benar
                else {
                    //Memanggil model absensi dengan method editAbsensi
                    $this->absensi->editAbsensi();
                    //Menampilkan pesan berhasil
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Edit Data Absensi</div>');
                    //redirect ke halaman data absensi
                    redirect('absensi/dataabsen');
                }
            }
        }
        //Jika Yang Login Bukan HRD
        else {
            $this->load->view('auth/blocked');
        }
    }

    //Method Hapus Data Absensi
    public function hapusabsensi($id_absen)
    {
        //Mengambil Session
        $role_id = $this->session->userdata("role_id");
        //Jika yang login HRD
        if ($role_id == 11 || $role_id == 1) {

            //mendelete kedalam database melalui method pada model absensi berdasarkan id nya
            $this->absensi->hapusAbsensi($id_absen);
            //menampikan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Success Delete Data Absensi</div>');
            //dan mendirect kehalaman perusahaan
            redirect('absensi/dataabsen');
        }
        //Jika Yang Login Bukan HRD
        else {
            $this->load->view('auth/blocked');
        }
    }
    

	public function download_template()
	{
		$file = './assets/tpl/template_absensi.xlsx'; // Lokasi file template
		force_download($file, NULL);
	}

	public function import_absensi() {
		// Load plugin PHPExcel
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
	
		// Panggil class PHPExcel
		$excel = new PHPExcel();
		
		// Mendefinisikan tipe file yang diizinkan
		$file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		
		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);
	
			if ('xlsx' == $extension) {
				$reader = PHPExcel_IOFactory::createReader('Excel2007');
			} else {
				$reader = PHPExcel_IOFactory::createReader('Excel5');
			}
	
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
	
			// Loop untuk setiap baris data
			foreach ($sheetData as $key => $row) {
				// Skip header (biasanya baris pertama)
				if ($key == 1) continue;
	
				// Menyiapkan data untuk disimpan ke database
				$data = [
					'nik_karyawan_absen' => $row['A'],
					'tanggal_absen' => PHPExcel_Style_NumberFormat::toFormattedString($row['B'], 'YYYY-MM-DD'),
					'tanggal_selesai' => PHPExcel_Style_NumberFormat::toFormattedString($row['C'], 'YYYY-MM-DD'),
					'keterangan_absen' => $row['D'],
					'lama_absen' => $row['E'],
					'keterangan' => $row['F'],
					'jenis_cuti' => $row['G'],
				];
	
				// Validasi data sebelum disimpan (jika diperlukan)
				// $this->form_validation->set_rules('nik_karyawan_absen', 'NIK Karyawan', 'required');
				// if ($this->form_validation->run() == TRUE) {
					// Simpan data ke database
					$this->absensi->insert_absensi($data);
				// }
			}
	
			redirect('absensi/dataabsen');
		} else {
			// Menangani kasus file tidak valid
			echo "File tidak valid atau tidak diizinkan.";
		}
	}
	
    
    
    
}
