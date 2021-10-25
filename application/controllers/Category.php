<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$table_base = "category";
		$info = [
			"page_title" => ["Kategori"],
			"nav_ids" => [$table_base],
			"table_base" => $table_base,
		];

		$this->pageInfo = $info;
		$this->post = $this->input->post();

        $this->load->model("{$this->pageInfo['table_base']}_m");
        
        $this->typeArr = [
            "in" => "Pemasukan",
            "out" => "Pengeluaran",
        ];
	}

	public function index()
	{
		$this->pageInfo['nav_ids'][] = "{$this->pageInfo['table_base']}_list";
		$this->pageInfo['page_title'][] = "List";
		$data['title'] = "List Kategori";
		$this->load->view('template/header',$data);
		$this->load->view("{$this->pageInfo['table_base']}/lists");
	}

	public function create()
	{
		$this->pageInfo['nav_ids'][] = "{$this->pageInfo['table_base']}_create";
		$this->pageInfo['page_title'][] = "Create";
		$data['title'] = "Create Kategori";
		$this->load->view('template/header',$data);
		$this->load->view("{$this->pageInfo['table_base']}/create");
    }
    
	public function update($id)
	{
		$this->pageInfo['nav_ids'][] = "{$this->pageInfo['table_base']}_list";
        $this->pageInfo['page_title'][] = "Update";
        $data = [
            'detail' => $this->category_m->get_detail($id),
            'id' => $id,
        ];
		$data['title'] = "Update Kategori";
		$this->load->view('template/header',$data);
		$this->load->view("{$this->pageInfo['table_base']}/update", $data);
	}

	public function get_datatable(){
		$result = $this->category_m->get_data();
        $i = 0;
        $table= [];
		foreach ($result['data'] as $key) {
			$table[$i] = $key;
			$table[$i]['action'] = "<a href='".site_url($this->pageInfo['table_base'].'/update/'.$key[$this->pageInfo['table_base'].'_id'])."' type='button' class='btn btn-update btn-primary'>Update</a>";
			$table[$i]['action'] .= " <button type='button' class='btn update-status btn-danger' data-id='{$key[$this->pageInfo['table_base'].'_id']}' data-status='inactive'>Delete</button>";

			$i++;
		}
		$datatable = [
			"data" => $table,
			"draw" => $this->post['draw'],
			"recordsTotal" =>$result['total_res'],
			"recordsFiltered" =>$result['total_res'],
		];

		echo json_encode($datatable);
    }
    
    public function process_insert(){
        parse_str($this->post['data-form'], $data);
        $process = $this->category_m->insert($data);
        echo json_encode($process);
    }
    public function process_update($id){
        parse_str($this->post['data-form'], $data);
        $process = $this->category_m->update($data,$id);
        echo json_encode($process);
    }

    public function update_status(){
        $data = [
            'status' => $this->post['status'],
        ];
        $process = $this->category_m->update($data,$this->post['id']);
        echo json_encode($process);
    }

}
