<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class Auth extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->UserModel = new UserModel();
		$this->session = Services::session();
	}
	public function index()
	{
		if ($this->session->loginSucces == \true) {
			return redirect()->to(\base_url());
		}
		$data = [
			'title' => 'Login - Fgis Apps',
			'subtitle' => 'Halaman Tambah Produk',
			"validation" => \Config\Services::validation()
		];
		return view('Auth/login', $data);
	}

	public function logging()
	{
		if (!$this->validate([
			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => ['required' => '{field} harus di isi !', 'valid_email' => 'email yang di masukan harus email valid!', 'is_not_unique' => 'email belum terdaftar!']
			],
			'password' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			]
		])) {
			return redirect()->to(route_to('login'))->withInput();
		}

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$row_db = $this->UserModel->get_data_login($email);

		if ($row_db == NULL) {
			session()->setFlashdata('berhasil', 'Maaf Email Yang Dimasukan Salah');
			return redirect()->to(route_to('login'));
		}
		if (password_verify($password, $row_db['password'])) {
			$data = [
				'loginSucces' => true,
				'nama' => $row_db['name'],
				'email' => $row_db['email'],
				'level' => $row_db['level']

			];

			session()->set($data);
			session()->setFlashdata('berhasil', 'Login Berhasil');
			return redirect()->to(route_to('home'));
		}
		session()->setFlashdata('berhasil', 'Maaf sandi Yang Dimasukan Salah');
		return redirect()->to(route_to('login'));
	}

	public function register()
	{
		if ($this->session->loginSucces == \true) {
			return redirect()->to(\base_url());
		}
		$data = [
			'title' => 'Register - Fgis Apps',
			'subtitle' => 'Halaman Registrasi Pengguna Baru',
			"validation" => \Config\Services::validation()
		];
		return view('Auth/register', $data);
	}

	public function registered()
	{
		if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi']
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => ['required' => '{field} harus di isi !', 'valid_email' => 'email yang di masukan harus email valid!', 'is_unique' => 'email sudah terdaftar!']
			],
			'password' => [
				'rules' => 'required|min_length[5]|max_length[12]',
				'errors' => ['required' => '{field} harus di isi !', 'min_length' => 'password minimal 5 karakter!', 'max_length' => 'password maksimal 12 karakter!']
			],
			'cpassword' => [
				'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
				'errors' => ['required' => 'confirm password harus di isi !', 'min_length' => 'password minimal 5 karakter!', 'max_length' => 'password maksimal 12 karakter!', 'matches' => 'password harus sama !']
			]
		])) {
			return redirect()->to(route_to('register'))->withInput();
		}

		$this->UserModel->save([

			'name' => \htmlspecialchars($this->request->getPost('nama')),
			'email' => \htmlspecialchars($this->request->getPost('email')),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'level' => $this->request->getPost('level')

		]);
		session()->setFlashdata('berhasil', 'akun telah terdaftar, silahkan login');
		return redirect()->to(route_to('login'));
	}

	public function logout()
	{

		session()->remove('loginSucces');
		session()->remove('nama');
		session()->remove('email');
		session()->remove('level');
		session()->setFlashdata('berhasil', 'Anda Telah Keluar');
		return redirect()->to(route_to('login'));
	}
}
