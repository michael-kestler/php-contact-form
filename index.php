<?php

//define error variable and set to empty value
$error= "";

//initiate success message variable
$successMessage;

if($_POST){
    if(empty($_POST['email'])) {
        $error .= "Email is required.<br>";
    } 

    if(empty($_POST['subject'])) {
       $error .= "Subject is required.<br>";
    }

    if(empty($_POST['body'])) {
        $error .= "Content is required here.<br>";
    }
//check if email address is correct format
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error .= "The email address is invalid.<br>";
}    


//check if there are errors
if($error != ''){
    $error = '<div class ="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error .'</div>';
} 
else {//email address is good
    $emailTo = "sean.kestler@gmail.com";
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $headers = "From: " . $_POST['email'];

    //try sending the email
    if(mail($emailTo, $subject, $body, $headers)){
        $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' .
        'we\'ll get back to you ASAP!</div>';
    } 
    else {
        $error = '<div class ="alert alert-danger role="alert">Your message couldn\'t be sent - try again later</div>';
        }//end if mail function succeeded or failed
    } //end else for the if $error != ""
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
    <div id="error"><?php echo $error.$successMessage; ?></div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset class ="form-group">
            <label for="email">Email address</label>
            <span class="error">* <?php echo $emailErr;?></span>
            <input type="email" class="form-control" id="email" name="email">
        </fieldset>
        <fieldset class="form-group">
            <label for="subject">Subject</label>
            <span class="error">* <?php echo $subjErr;?></span>
            <input type="text" class="form-control" id="subject" name="subject">
        </fieldset>
        <fieldset class="form-group">
            <label for="body">What would you like to ask us?</label>
            <span class="error">* <?php echo $bodyErr;?></span>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </fieldset>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script type = "text/javascript">
        $("form").submit(function (e) {
                let error = "";

                if($('#email').val() === "") {
                    error += "The email field is required.<br>"
                }

                if($('#subject').val() === "") {
                    error += "The subject field is required.<br>"
                }

                if($("content").val() === "") {
                    error += "The content field is required.<br>"
                }
                //test if there was an error or not

                if(error != "") {
                    $("#error").html('<div class="alert alert-danger"' + 
                    'role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                } else { //no errors
                    return true;
                } // end if-else
            });
        </script>
    </body>
</html>


