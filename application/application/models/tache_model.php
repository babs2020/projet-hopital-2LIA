<?php 

class tache_model extends CI_Model
{
    function insertTache($data)
    {
        $this->db->insert('tache',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function getTaches()
    {
        $query = $this->db->get('tache');
        return $query->result_array();
    }

    function getTache($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('tache');
        return $query->row();

    }

    function updateTache($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('tache',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function deleteTache($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tache');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
}