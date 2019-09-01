<?php
if(isset($_POST['save']))
{
  //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';

  $contact_name = $_POST['contact_name'];
  $contact_email = $_POST['contact_email'];
  $contact_password = $_POST['contact_password'];




  $query= "insert into contacts (contactName, contactEmail, contactPassword) VALUES('$contact_name', '$contact_email', '$contact_password')";
  $query_run = mysqli_query($con,$query);

      if($query_run)
      {
         
      }
      else
      {
         echo '<script type="text/javascript"> alert("Error") </script>';
      }
}

?>
