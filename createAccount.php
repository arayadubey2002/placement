<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- for bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<style>
    .box,h1
    {
        color:rgb(1, 167, 112) ;
         text-align: center;
    }
    
    h1{
        margin:20px;
    }
</style>
<body>
    <h1>The Placement Story</h1>
            <div class="box" style="border: 2px solid rgb(1, 167, 112); text-align: center;">
                <h2>Create Account</h2>
                <form action="/thePlacementStory/createAccount.php" method="POST">
                    <input type="email" name="email" placeholder=" Email"
                        style="border:  1px solid rgb(1, 167, 112); width: 70%; padding: 10px;margin-bottom: 10px; background-color: rgb(215, 250, 238);">
                    <br>
                    <input type="password" name="password" placeholder="Password"
                        style="border:  1px solid rgb(1, 167, 112); width: 70%; padding: 10px;margin-bottom: 10px; background-color: rgb(215, 250, 238);">
                    <br>
                    <input type="password" name="cpassword" placeholder="Confirm Password"  style="border:  1px solid rgb(1, 167, 112); width: 70%; padding: 10px;margin-bottom: 10px; background-color: rgb(215, 250, 238);">
                    <br>
                    <button value="createAccount"
                        style="background-color: rgb(1, 167, 112);color: rgb(215, 250, 238); padding: 8px 13px 8px 13px; margin-bottom: 10px; border: none;">Create Account</button>
                </form>
            </div>

          
        
</body>
</html>
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;

    $sql = "Select * from userdata where email='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);




    if (empty($_POST["email"])){
        $showError = "Email is required";
    }
 else{



    if(($password == $cpassword) && $exists==false && $num==0){
        $sql = "INSERT INTO `userdata` ( `email`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        
        
        if ($result){
            $showAlert = true;
        }
    }
    else{

        if($num != 0){
            $showError ="Already have an account , with this email";
        }
        else{
        $showError = "Passwords do not match";
        }
    }
    
}

}
?>


<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is created . You can login now 
        <a href="buybooks.html"> <button type="button" >Log - In </button> </a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
