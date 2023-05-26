<?php 

class patient_model extends CI_Model
{
    function insertProjet($data)
    {
        $this->db->insert('projets',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function getProjets()
    {
        $query = $this->db->get('projets');
        return $query->result_array();
    }

    function getProjet($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('projets');
        return $query->row();

    }

    function updateProjet($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('projets',$data);
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