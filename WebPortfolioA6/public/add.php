<?php
    include "../shared/header.php";
    require_once('../private/db_init.php');
    
    // outcome records info of the validation process
    $outcome = "";
    $validName = false;
    $validEmail = false;
    $userdata = array("name"=>"", "email"=>"");
    // userdata represents the user, insert_user will validate it accordin to its keys
    if (isset($_POST["SubmitButton"])) {
        if (preg_match("/[a-zA-Z']+(?:\s|-)*[a-zA-Z']+(?:\s|-)*[a-zA-Z']+$/", $_POST["name"])) {
            $outcome = "Name - valid, ";
            $validName = true;
        } else {
            $outcome = "Name - invalid, ";
        }
        if (preg_match("/([a-zA-z0-9\.]*@(?:[a-zA-Z0-9\.])+\.(?:com(?:\.au)?|net))$/", $_POST["email"])) {
            $outcome .= "Email - valid ";
            $validEmail = true;
        } else {
            $outcome .= "Email - invalid ";
        }
        // only prepare query if boolean flags are valid
        if ($validName && $validEmail) {
            $outcome .= "--Adding to database..." . $userdata["name"]. $userdata["email"];
            $userdata["name"] = $_POST["name"];
            $userdata["email"] = $_POST["email"];
            if ($result = insert_user($userdata)) {
                $outcome .= "</br>Added successfully";
            } else {
                $outcome .= "</br>" . mysqli_error($connection);
            }
        } else {
            $outcome .= "</br>Error! Please make sure both fields are valid.";
        }
    }
    
?>
<h1>Add User to Database</h1>

<p>
    Your name may only contain alphabetical letters, zero or more spaces, zero or more apostrophes,
    and zero or more hyphens. </br>
</p>
<p>
    Your email must be formatted as so: name@domainname.com  
    <ul>
        <li>Mail name (before @) may contain a full stop</li>
        <li>Domain name may contain additional parts separated by full stops</li>
        <li>Email must end in either .com, .net, or .com.au</li>
    </ul>
</p>

<!-- form using POST, handle the submission on the same page -->
<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name">
    <label for="email">Email:</label>
    <input type="text" name="email">
    <input type="submit" name="SubmitButton"/>
</form>

<p class="result">Outcome of query: </p>

<?php
    //display validation outcome, advise user to follow directions
    if (isset($outcome)) {
        echo "<p>$outcome</p>";
    }
    include "../shared/footer.php";
?>