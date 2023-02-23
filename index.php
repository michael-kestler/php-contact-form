<?php

//define error variables and set to empty values
$emailErr = $subjErr = $bodyErr = "";

if($_POST){
    if(empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        //check if email address is correct format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = test_input($_POST['email']);
    }    
       
    }
}

if($_POST){
    if(empty($_POST['subject'])) {
       $subjErr = "Subject is required.";
    } else {
        $subject = test_input($_POST['subject']);
    }
}
 if($_POST){
    if(empty($_POST['body'])) {
        $bodyErr = "Content is required here.";
    } else {
        $body = test_input($_POST['body']);
    }
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error{color: #FF0000;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Contact Us</title>
</head>
<body>
<div class="container">
    <h1>Get in touch!</h1>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset class ="form-group">
            <label for="email">Email address</label>
            <span class="error">* <?php echo $emailErr;?></span>
            <input type="email" class="form-control" name="email">
        </fieldset>
        <fieldset class="form-group">
            <label for="subject">Subject</label>
            <span class="error">* <?php echo $subjErr;?></span>
            <input type="text" class="form-control" name="subject">
        </fieldset>
        <fieldset class="form-group">
            <label for="body">What would you like to ask us?</label>
            <span class="error">* <?php echo $bodyErr;?></span>
            <textarea class="form-control" name="body" rows="3"></textarea>
        </fieldset>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
    <br><br>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</div>
</body>
</html>


<?php
echo "<h2>Your Input</h2>";
echo "Email address: " . $email;
echo "<br>";
echo "Subject: " . $subject;
echo "<br>";
echo "Message: " . $body;
?>