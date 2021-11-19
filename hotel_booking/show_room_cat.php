<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 300px;
        }
        
        body {
            background: rgb(25,39,52);
        }
        
        h4 {
            color: white;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }
        
.container{
    padding: 10px;
}
.image{
    padding: 10px;
    right: 50px;
}



    </style>
    
    
</head>

<body>
      
    <div class = "image">
      <img src="logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
            
  
    <div class="container">
       
       <nav class="navbar navbar-inverse">
           <div class="container-fluid">
               <ul class="nav navbar-nav">
                   <li><a href="index.php">Home</a></li>
                   <li><a href="hotels.php">Hotels</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li class="active"><a href="User.php">Login</a></li>
                   <li><a href="userRegister.php">Customer Registration</a></li>
                 </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Manager.php?q=logout">
                            <button class = "btn btn-primary" type="button">Sign Out</button>
                        </a>
                    </li>
                </ul>
               </ul>
           </div>
       </nav>
       <hr>
        
        
        
        <?php
        
        $sql="SELECT * FROM Hotel";


        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                        echo "
                            <div class='row'>
                            <div class='col-md-2'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['name']."</h4><hr>
                                <h6>Aminities: ".$row['amenities']."</h6>";

                    $hotelID = $row['hotelID'];
                    $sql2 = "SELECT * FROM Hotel_Rooms WHERE Hotel_Rooms.hotelID = '$hotelID'";
                    $result2 = mysqli_query($user->db, $sql2);

                    if($result2){
                        if(mysqli_num_rows($result2) >0){
                            while($row2 = mysqli_fetch_array($result2)){
                            echo
                                "<h6>".$row2['room_type'].": $".$row2['rate']." Capacity: ".$row2['total_num']." </h6>  ";
                            }
                        }else{
                            echo "No Data Exists";
                        } 
                    }else{
                        echo "Cannot connect to server".$result;
                    }
                            
                        echo "   </div>
                            </div>                           
                         ";                                       
                }
                          
            }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        
        
        
        
        
        
        
        
        
        
        
        
        ?>
    </div>
    
    
    
</body>

</html>