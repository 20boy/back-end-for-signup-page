<?php
require_once "connect.php";


if(isset($_POST['submit'])){
  $firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
   $secondname = mysqli_real_escape_string($conn, $_POST['Secondname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$statement = "INSERT into hungry (	firstname, secondname, email, password)
                            VALUES('$firstname', '$secondname', '$email', '$hashedpassword')";

$result = mysqli_query($conn,$statement);

if ($result  && mysqli_affected_rows($conn) > 0) {
  header("Location: index.html");
  exit;
} else {
  echo "registration failed";
}

};
?>
