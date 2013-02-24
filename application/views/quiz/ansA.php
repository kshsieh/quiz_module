<?php

if ($question['ChoiceA'] === $question['Correct'])
{
    /*
    $this->load->library('session');
    $score = $this->session->userdata('score');
    $score++;
    
    $this->session->setuserdata('score' => $score);
    */
    $this->load->library('session');
        
    #pulling elements out of session to edit
    $num = $this->session->userdata('num');
    $score = $this->session->userdata('score');
    $except = $this->session->userdata('except');
    $numanswer = $this->session->userdata('numaswer');
    $total = $this->session->userdata('total');
    
    $score++;
    
    $take = array(
    'num' => $num,
    'score' => $score,
    'except' => $except,
    'numaswer' => $numanswer,
    'total' => $total
    );

    $this->session->set_userdata($take);
    
    echo 'That was the correct answer!';
}
else
{
    echo 'Incorrect. The correct answer is ' . $question['Correct'] . '.';
}
?>
<br><br>
<a href='take'>Next question</a>
<br>