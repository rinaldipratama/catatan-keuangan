<?php
class Transaction_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "transaction";
        $this->post = $this->input->post();
    }

    public function get_total_by_type($type)
    {
        $this->db->select_sum('nominal');
        $this->db->where('a.status', 'active'); //onli active item
        $this->db->where('b.type', $type);
        $this->db->join('category b', 'a.category_id = b.category_id', 'left'); 
        $this->db->from($this->table.' a');
        $query = $this->db->get();

        $nominal = $query->row()->nominal;

        return $nominal;
    }

    public function get_detail($id)
    {
        $this->db->where($this->table . '_id', $id);
        $this->db->from($this->table);
        $query = $this->db->get();

        $data = $query->row_array();

        return $data;
    }

    public function get_data()
    {
        $server_side = $this->post['server_side'];
        parse_str($this->post['filter'], $filter);
        if ($filter['type'] != '') {
            $this->db->where('b.type', $filter['type']);
        }


        if ($filter['range_start'] != '') {
            $this->db->where("DATE_FORMAT(a.create_date,'%Y-%m-%d') >=", $filter['range_start']);
        }

        if ($filter['range_end'] != '') {
            $this->db->where("DATE_FORMAT(a.create_date,'%Y-%m-%d') <=", $filter['range_end']);
        }

        if ($filter['range_start'] == '' && $filter['range_end'] == '') {
            $current_mount = date("Y-m");
            $this->db->where("DATE_FORMAT(a.create_date,'%Y-%m')", $current_mount);
        }

        $this->db->where('a.status', 'active'); //onli active item
        $this->db->join('category b', 'a.category_id = b.category_id', 'left'); 
        $this->db->select("SQL_CALC_FOUND_ROWS a.*, b.name category_name, b.type category_type", false);
        $this->db->from($this->table.' a');
        $this->db->order_by('create_date', 'ASC');

        if ($server_side == true) {
            $this->db->limit($this->post['length'], $this->post['start']);
        }
        $query = $this->db->get();

        $data = $query->result_array();

        // var_dump($this->db->last_query());exit;

        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $total_res = $query->row()->Count; //count total data

        return [
            "data" => $data,
            "total_res" => $total_res,
        ];
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        $this->db->update($this->table, $data, array($this->table . '_id' => $id));
    }

}
