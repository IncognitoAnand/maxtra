<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Max_model extends CI_Model {

    public function __construct(){

        parent::__construct();

    }

     public function savedata($data,$table,$id=NULL){
        $this->load->database();
        if($id){
            $this->db->update($table, $data, array('id' => $id));
            return $id;
        } else {
            $this->db->insert($table,$data);
            return $this->db->insert_id();
        }
    }

    public function list()
    {
        $this->load->database();
        $sql = "SELECT * FROM `ajax`";
        $query = $this->db->query($sql);
        $data = $query->result();
        return $data;
    }

    public function displaydata($id)
    {
        $this->load->database();
        $sql = "SELECT * FROM `ajax` WHERE id=".$id;
        $query = $this->db->query($sql);
        $data = $query->row();
        return $data;
    }

    public function update($data, $id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('ajax', $data);
    }
    
    public function hard_delete($table, $id)
    {
        $this->load->database();
        $this->db->delete($table, array('id' => $id));
    }

}

?>