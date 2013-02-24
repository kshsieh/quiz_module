<h2>Enter a new question</h2>

<?php echo validation_errors();?>

<?php echo form_open('quiz/create')?>

    <label for="Question">Question</label>
    <input type="input" name="Question"/><br/>
    
    <label for="ChoiceA">ChoiceA</label>
    <input type="input" name="ChoiceA"/><br/>
    
    <label for="ChoiceB">ChoiceB</label>
    <input type="input" name="ChoiceB"/><br/>
    
    <label for="ChoiceC">ChoiceC</label>
    <input type="input" name="ChoiceC"/><br/>
    
    <label for="ChoiceD">ChoiceD</label>
    <input type="input" name="ChoiceD"/><br/>
    
    <label for="Correct">Correct</label>
    <input type="input" name="Correct"/><br/>
    
    <input type="submit" name="submit" value="Create new question"/>

</form>