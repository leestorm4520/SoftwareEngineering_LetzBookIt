<?php
include_once 'include/class.user.php'; 
$user=new User(); 
if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $register=$user->reg_user($fullname, $uname, $upass, $uemail); 
    if($register) 
    { 
        echo "
                <script type='text/javascript'>
                    alert('Your Manager has been Added Successfully');
                </script>"; 
        echo "
                <script type='text/javascript'>
                    window.location.href = '../Manager.php';
                </script>"; 
    } 
    else 
    {
        echo "
                <script type='text/javascript'>
                    alert('Registration failed! username or email already exists');
                </script>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LETS BOOK IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if (form.name.value == "") {
                alert("Enter Name.");
                return false;
            } else if (form.uname.value == "") {
                alert("Enter username.");
                return false;
            } else if (form.upass.value == "") {
                alert("Enter Password.");
                return false;
            } else if (form.uemail.value == "") {
                alert("Enter email.");
                return false;
            }
        }
    </script>

<style>
    
    body {
        background: rgb(25,39,52);
    }

    h2 {
    text-align: center;
    color: black;
    }

    #click_here {
    margin-top: 10px;
    text-align: center;
    
    }

    .container
    {
        padding: 10px;
    }

   
    .button
    {
    
    width: 100px;
    float: center;
    font-size: 13px;
    
    }
    .well
        {
            width: 500px;
        }
  </style>
</head>

<body>
<div class = "image">
      <img src="../logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
       
       <nav class="navbar navbar-inverse">
           <div class="container-fluid">
               <ul class="nav navbar-nav">
                   <li><a href="../index.php">Home</a></li>
                   <li><a href="../hotels.php">Hotels</a></li>
                   <li><a href="../contact.php">Contact</a></li>
                   <li class="active"><a href="registration.php">Login</a></li>
                   <li><a href="../userRegister.php">Customer Registration</a></li>
                 </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Manager.php?q=logout">
                            <button class = "btn btn-primary" type="button">Sign Out</button>
                        </a>
                    </li>
                </ul>
               </ul>
           </div>
       </nav>
       <hr>

        <div class="well">
            <h2>Add Your Manager</h2>
            <hr>
            <form action="" method="post" name="reg">
            <div class="form-group"> 
                   <input placeholder ="Enter First and Last Name (eg. John Smith)" type="text" class="form-control" name="name" pattern ="^[A-Za-z]+\s[A-Za-z]+$" required>
               </div>
                <div class="form-group">        
                    <input type="text" class="form-control" name="uname" placeholder="Enter User Name (At least 8 characters)" minlength="8" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="uemail" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="upass" placeholder="Pick your password (At least 8 characters" minlength="8" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Manager" onclick="return(submitreg());">Submit</button>

               <br>
                <div id="click_here">
                    <a href="../Manager.php">Back to HOME</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>