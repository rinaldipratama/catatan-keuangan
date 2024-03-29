<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$info = [
			"page_title" => ["Home"],
			"nav_ids" => ["home"],
		];

		$this->pageInfo = $info;

		$this->load->model('transaction_m');
	}

	public function index()
	{
		// $this->pageInfo['nav_ids'][] = "";
        $this->pageInfo['page_title'][] = "Welcome";
        $total_in = $this->transaction_m->get_total_by_type('in');
        $total_out = $this->transaction_m->get_total_by_type('out');
        $total = $total_in-$total_out;
        $data = [
            'total_in' => $total_in,
            'total_out' => $total_out,
            'total' => $total,
        ];
		$data['title'] = "Halaman Utama";
		$this->load->view('template/header',$data);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
}
