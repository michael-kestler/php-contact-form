<?php



//define error variables and set to empty values
$emailErr = $subjErr = $bodyErr = "";

if($_SERVER['REQUEST METHOD'] == 'POST'){
    if(empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        $email = test_input($_POST['email']);
    }
}

if($_SERVER['REQUEST METHOD'] == 'POST'){
    if(empty($_POST['subject'])) {
       $subjErr = "Subject is required.";
    } else {
        $subject = test_input($_POST['subject']);
    }
}

    if(empty($_POST['body'])) {
        $bodyErr = "Body is required.";
    } else {
        $body = test_input($_POST['body']);
    }



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if($_POST) {


    

    // echo ("Your message was sent's email is " . $_POST['email'] . "<br><br>");

    // echo ("The subject is " . $_POST['subject'] . "<br><br>");
      
    // echo ("Here is the body: " . $_POST['body'] . "<br><br>");

    
}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Contact Us</title>
</head>
<body>
<div class="container">
    <h1>Get in touch!</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset class ="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email">
        </fieldset>
        <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject">
        </fieldset>
        <fieldset class="form-group">
            <label for="body">What would you like to ask us?</label>
            <textarea class="form-control" name="body" rows="3"></textarea>
        </fieldset>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</div>
</body>
</html>