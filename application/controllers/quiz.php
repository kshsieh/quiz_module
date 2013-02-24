<?php
class Quiz extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('quiz_model'); 
   }
    
    public function index()
    {
        $this->load->library('session');
        #initializing elements that will need to be stored across pages
        $init = array(
            'num' => 0,
            'score' => 0,
            'except' => array(),
            'numaswer' => 0,
            'total' => $this->quiz_model->total_questions(),
            );
        $this->session->set_userdata($init);
        
        $data['title']='Welcome to the IndianRaga Quiz!';
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/index');
        $this->load->view('templates/footer');
    }
    
    public function take()
    {
        $this->load->library('session');
        
        #pulling elements out of session to edit
        $num = $this->session->userdata('num');
        $score = $this->session->userdata('score');
        $except = $this->session->userdata('except');
        $numanswer = $this->session->userdata('numaswer');
        $total = $this->session->userdata('total');
        
        #creating new values
        if ($numanswer === $total){ #endgame code
            $data['title'] = 'Congratulations!';
            $data['message'] = 'You have answered all the questions!';
            $data['score'] = $score;
            $data['total'] = $total;

            $this->load->view('templates/header', $data);
            $this->load->view('quiz/end', $data);
            $this->load->view('templates/footer');
        } else {
            if($except["$num"] === TRUE or $num < $total){
                $num = $this->quiz_model->get_num();
                $except["$num"] = TRUE;
                $numanswer++;
                
                $data['title'] = 'Question';
                $data['question'] = $this->quiz_model->get_question($num);
                $data['score'] = $score;
                $data['scoretotal'] = $numanswer-1;
                
                #some temp diagnostic data
                $data['numanswer'] = $numanswer;
                $data['num'] = $num;
                $data['exceptions'] = $except;
                $data['total'] = $total;
                

                $this->load->view('templates/header', $data);
                $this->load->view('quiz/take', $data);
                $this->load->view('templates/footer');
            }
            else{
                $except["$num"] = TRUE;
                $numanswer++;
                
                $data['title'] = 'Question';
                $data['question'] = $this->quiz_model->get_question($num);
                $data['score'] = $score;
                
                #some temp diagnostic data
                $data['numanswer'] = $numanswer;
                $data['num'] = $num;
                $data['exceptions'] = $except;
                $data['total'] = $total;

                $this->load->view('templates/header', $data);
                $this->load->view('quiz/take', $data);
                $this->load->view('templates/footer');
            }
        }
        
        #storing back in session
        $take = array(
            'num' => $num,
            'score' => $score,
            'except' => $except,
            'numaswer' => $numanswer,
            'total' => $total
            );
        
        $this->session->set_userdata($take);
    }
    
    public function ansA()
    {
        $this->load->library('session');
        $num = $this->session->userdata('num');
        
        $data['title'] = 'Answer';
        $data['question'] = $this->quiz_model->get_question($num);
        $data['number'] = $num;
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/ansA', $data);
        $this->load->view('templates/footer');
    }
    
    public function ansB()
    {
        $this->load->library('session');
        $num = $this->session->userdata('num');
        
        $data['title'] = 'Answer';
        $data['question'] = $this->quiz_model->get_question($num);
        $data['number'] = $num;
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/ansB', $data);
        $this->load->view('templates/footer');
    }
    
    public function ansC()
    {
        $this->load->library('session');
        $num = $this->session->userdata('num');
        
        $data['title'] = 'Answer';
        $data['question'] = $this->quiz_model->get_question($num);
        $data['number'] = $num;
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/ansC', $data);
        $this->load->view('templates/footer');
    }
    
    public function ansD()
    {
        $this->load->library('session');
        $num = $this->session->userdata('num');
        
        $data['title'] = 'Answer';
        $data['question'] = $this->quiz_model->get_question($num);
        $data['number'] = $num;
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/ansD', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Create a question';
        
        $this->form_validation->set_rules('Question', 'Question', 'required');
        $this->form_validation->set_rules('Correct', 'Correct', 'required');
        
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('quiz/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->quiz_model->set_quiz();
            $this->load->view('quiz/success');
        }
    }
    
    public function preview()
    {
        $data['question'] = $this->quiz_model->get_question();
        $data['title']='Question Preview';
        
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/preview', $data);
        $this->load->view('templates/footer');
    }
}
?>
