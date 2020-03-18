<?php
    include "../shared/header.php";
    require_once('../private/db_init.php'); 
    
    $outcome = "";
    $validName = False;
    $validEmail = False;
    $userdata = array("name"=>"", "email"=>"");
    if (isset($_POST["SubmitButton"])) {        
        if (preg_match("/[a-zA-Z']+(?:\s|-)*[a-zA-Z']+(?:\s|-)*[a-zA-Z']+$/", $_POST["name"])) {
            $outcome = "Name - valid, ";
            $validName = True;
        } else {
            $outcome = "Name - invalid, ";
        }
        if (preg_match("/([a-zA-z0-9\.]*@[a-zA-Z]*\.(?:com(?:\.au)?|net))$/", $_POST["email"])) {
            $outcome .= "Email - valid ";
            $validEmail = True;
        } else {
            $outcome .= "Email - invalid ";            
        }
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
<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name">
    <label for="email">Email:</label>
    <input type="text" name="email">
    <input type="submit" name="SubmitButton"/>
</form>


<p class="result">Outcome of query: </p>


<?php
    if (isset($outcome)) {
        echo "<p>$outcome</p>";
    }
    include "../shared/footer.php";
?>