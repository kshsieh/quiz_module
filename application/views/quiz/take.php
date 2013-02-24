<h2><?php echo $question['Question']?></h2>

<h3>
    <?php echo 'Your score is: ' . $score . ' out of ' . $scoretotal;?><br>
    <a href="ansA"><?php echo $question['ChoiceA']?></a>
    <br>
    <a href="ansB"><?php echo $question['ChoiceB']?></a>
    <br>
    <a href="ansC"><?php echo $question['ChoiceC']?></a>
    <br>
    <a href="ansD"><?php echo $question['ChoiceD']?></a>
    <br>
</h3>
<body>
    <b>Module Diagnostics</b><br><br>
    <?php echo 'Answering: ' . $numanswer . ' out of ' . $total;?><br>
    <?php echo 'Currently answering Question #'. $num;?><br>
</body>