<?php
session_start();
require_once 'connect.php';


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

     $statement = "SELECT id,password FROM hungry WHERE email = '$email'";
      $response = $conn->query($statement);

if ($response ->num_rows > 0) {
  $row = $response->fetch_array();
      if ($row) {
          if (password_verify($password, $row['password'])) {
                 $id = $row['id'];
                 $_SESSION['id'] = $id;
                 header('Location: index.html'); // Redirect to index page upon successful login
                 exit; // Terminate the current script to prevent further execution
             } else {
                 echo 'Invalid Password';
             }
         } else {
             echo 'Invalid Email/n';
             var_dump($response);
              var_dump($row);
         }
     } else {
             echo 'Database Error: ' . $conn->error;
         }
};

?>
