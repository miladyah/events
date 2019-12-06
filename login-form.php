<div style="float:right;">        
<?php
  if(empty($_SESSION['userName']))       // if user is not logged in
  {
?>

  <form method="post" action="login.php">
  <input   type="text" name="userName" placeholder="Username" />
  <input   type="password"  name="password" placeholder="Password" />
  <input   type="submit"  name="login_button" value="login" />

</form>
<?php
  }
  else
  {
    $uname = $_SESSION['userName'];                             // getting logged in user-name and saving into the variable named $uname
    $sql = "SELECT * FROM te_users where username='$uname'";    //query to get the First and surname of logged in admin
    $queryresult = $conn->query($sql);

																//fetch data from the database table 
    while($row = $queryresult->fetch_assoc())
    {
        $userID = $row['userID'];
        echo $firstname = $row['firstname'];
        echo " ";
        echo $surname = $row['surname'];
        echo " ";

    }
?>

    <a href="logout.php?id=<?php echo $userID; ?>">Logout</a>     <!-- Logout -->
<?php
  }
?>
</div>
