<?php
class Quiz_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }

    public function get_question($num = FALSE)
    {
        if ($num === FALSE){
            $query = $this->db->get('testlist');
            return $query->result_array();  
        }
        else{
            $query = $this->db->get_where('testlist', array('Number' => $num));
            return $query->row_array();
        }
      
    }
    
    public function get_num()
    {
        $total = $this->db->count_all('testlist');
        $num = rand(1, $total);
        return $num;
    }
    public function total_questions()
    {
        $total = $this->db->count_all('testlist');
        return $total;
    }
    public function set_quiz()
    {
        $this->load->helper('url');
        
        $data=array(
            'Question'=>$this->input->post('Question'),
            'ChoiceA'=>$this->input->post('ChoiceA'),
            'ChoiceB'=>$this->input->post('ChoiceB'),
            'ChoiceC'=>$this->input->post('ChoiceC'),
            'ChoiceD'=>$this->input->post('ChoiceD'),
            'Correct'=>$this->input->post('Correct')
            
        );
        
        return $this->db->insert('testlist', $data);
    }
}
?>