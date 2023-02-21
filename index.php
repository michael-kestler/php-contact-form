<?php
    
if($_POST) {
    print_r($_POST);
}


?>    

<h1>Get in touch!</h1>

<form method = "post">
<label for="email">Email address</label>
<p><input type="email" name="email"></p>

<label for="subject">Subject</label>
<p><input type="text" name="subject"></p>

<label for="body">What would you like to ask us?</label>
<p><textarea name="body"></textarea></p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>

