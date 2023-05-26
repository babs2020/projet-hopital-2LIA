<?php 

class activite_model extends CI_Model
{
    function insertActivite($data)
    {
        $this->db->insert('activite',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function getActivites()
    {
        $query = $this->db->get('activite');
        return $query->result_array();
    }

    function getActivite($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('activite');
        return $query->row();

    }

    function updateActivite($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('activite',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function deleteProjet($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('projets');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
}