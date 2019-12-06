<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tyne Events</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
@session_start(); /* starting the session */

if(isset($_POST['login_button'])){ /* If user press login button then he will go into this condition */
					/* filters been used to remove tags and remove or encode special characters from a string. */
                    $uname = filter_has_var(INPUT_POST, 'userName') ? $_POST['userName']: null;
                    $pword  = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
                    $uname =filter_var($uname ,FILTER_SANITIZE_STRING);
                    $pword  =filter_var($pword ,FILTER_SANITIZE_STRING);
                    $errors = array();

					/* trim removes whitespace or other predefined characters from both sides of a string */
                    $uname = trim($uname);
					$pword = trim($pword);

					if (empty($uname) || empty($pword)) { /* Checking if username and passwords are not emty */
					$erorr []= "<p align='center'>You have not entered all of the required fields</p>\n";
					}

                    else {
                        include 'database_conn.php';  // make database connection


                        $sql = "SELECT passwordHash FROM te_users WHERE username = '$uname'";  /* Login query */

                        $stmt = mysqli_prepare($conn, $sql);


                       @mysqli_stmt_bind_param($stmt, "s", $uname);

                        mysqli_stmt_execute($stmt);  // execute the query


                        mysqli_stmt_bind_result($stmt, $passwordHash);


                        if (mysqli_stmt_fetch($stmt)) {

                            if (password_verify($pword, $passwordHash)) {/* If passowrd correct */
								$_SESSION['userName'] = $uname;
                                echo "<h1>Password correct!</h1>\n";
								header( "refresh:3;url=index.php" ); /* If passowrd not correct takes the user to index page after 3 seconds */

                            } else {     /* If passowrd not correct */
                                $erorr[] = "<h1>Password incorrect.</h1>\n";
								header( "refresh:3;url=index.php" ); /* If passowrd correct takes the user to index page after 3 seconds */
                            }
                        } else {/* If user name and passowrd not correct */							
                            $erorr[] = "<h1>Sorry wrong username and password...!</h1>";				
							header( "refresh:3;url=index.php" );    
                        }

                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }
                        if (!empty($erorr)) { /* If user name and passowrd is not entered */
                            echo "<h1>The following problem(s):</h1>\n";
                            for ($a = 0; $a < count($erorr); $a++) {
                                echo "$erorr[$a] <br />\n";
                            }
                        }

}



                ?>
