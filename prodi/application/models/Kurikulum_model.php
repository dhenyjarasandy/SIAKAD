<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kurikulum_model extends CI_Model
{

    public $table = 'tb_kurikulum';
    public $id = 'id_kurikulum';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($where_prodi)
    {
        $this->db->where('kd_prodi',$where_prodi);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id,$where_prodi)
    {
        $this->db->where('kd_prodi',$where_prodi);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL,$where_prodi) {
        $this->db->where('kd_prodi',$where_prodi);
        $this->db->like('id_kurikulum', $q);
      	$this->db->or_like('nm_kurikulum', $q);
      	$this->db->or_like('ta', $q);
      	$this->db->or_like('kd_prodi', $q);
      	$this->db->or_like('status', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL,$where_prodi) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kurikulum', $q);
      	$this->db->or_like('nm_kurikulum', $q);
      	$this->db->or_like('ta', $q);
      	$this->db->or_like('kd_prodi', $q);
      	$this->db->or_like('status', $q);
      	$this->db->limit($limit, $start);
        $this->db->where('kd_prodi',$where_prodi);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_query($q)
    {
        return $this->db->query($q);
    }
}
