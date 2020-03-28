<!DOCTYPE html>
<?php
include("session.php");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin- Activity Point</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
  .container {
    width:650px;
    margin:30px auto;
  }
  table tr td:last-child a{
            margin-right: 15px;
        }
   .mystyle {
      width:680px;
   }  
   .mybtn {
    float:right;
   }
   
   .mytable {margin-top:20px;}
   .form {margin:10px;}
   input {margin-top:10px;}
   h2 {border-bottom:1px solid #333;}
  </style>
</head>
<body>

<div class="container">
  <div class="jumpatron">
  <div class="row">
  
    <div class="col-10">
    <h2 class="pull-left">Actitvity Point  Details</h2>
    </div>
    <div class="col">
    <a href="logout.php" class="btn btn-success " role="button">Logout</a>
    </div>
                       
                      
                    
        <form class="" action="" method="post" name="form1">
          <div class="row mystyle">
            <div class="col"><input type="text" name="studentname" class="form-control form-control-lg" placeholder="Enter the name of the Student" aria-describedby="sizing-addon1" required></div>
          </div>
          <div class="row">
            <div class="col">
            <input type="submit"  value="View Entries" name="adminsubmit" class="btn btn-lg btn-primary mybtn col-lg-12">
            </div>
          </div>     
</form>

<?php 
 
 if(isset($_POST['adminsubmit'])){
   $name=$_POST['studentname'];
   $_SESSION['uname']=$name;
 }  
 if(isset($_SESSION['uname']))
 {
   $name=$_SESSION['uname'];
   $sql=mysqli_query($connection,"Select * from profile where username='$name'"); 
   if($sql && isset($_SESSION['uname']))
   {
     if(mysqli_num_rows($sql) >0 )
     {
       echo "<table class='table table-bordered table-striped mytable'>";
       echo "<thead>";
         echo "<tr>";
           echo "<th>Username</th>";
           echo "<th>Activity</th>";
           echo "<th>Calcualted Points</th>";
           echo "<th>Action</th>";
         echo "</tr>";
       echo "</thead>";
       echo "<tbody>";
       while($row = mysqli_fetch_array($sql))
       {
         echo "<tr>";
         echo "<td>" . $row['username'] . "</td>";
         echo "<td>" . $row['activity'] . "</td>";
         echo "<td>" . $row['points'] . "</td>";
         echo"<td>";
         echo "<a href='delete.php?slno=". $row['slno'] ."' title='Delete Entry' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
         echo "</td>";
         echo "</tr>";
       }
       echo "</tbody>";                            
     echo "</table>";
     }
     else  { echo "<p class='lead'><em>No records were found.</em></p>";}
 }
}
 else { echo "<p class='lead'><em>Enter the name to view the records.</em></p>";}
 ?>
 </div>

  
  
  <form action="cadmin.php" method="post" name="finalsubmit">
  <div class="row">
      <div class="col update mybtn">
        <input type="submit" name="update" value="Update" class="btn btn-raised btn-primary" role="button"></a>
      </div>
  </div>
  </form>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>


