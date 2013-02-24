<?php foreach($question as $question_item):?>

<h2><?php echo $question_item['Question']?></h2>

<h3><?php echo $question_item['ChoiceA']?>
    <br>
    <?php echo $question_item['ChoiceB']?>
    <br>
    <?php echo $question_item['ChoiceC']?>
    <br>
    <?php echo $question_item['ChoiceD']?>
    <br>
    <br>
    <?php echo 'Correct' . ': ' . $question_item['Correct']?>
</h3>

<?php endforeach?>
