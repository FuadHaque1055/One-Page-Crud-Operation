<?php
     
      session_start();
       //variable initialization
       $name="";
       $address="";
       $id=0;
       $edit_state=false;


       //Database Connection

       $db=mysqli_connect('localhost','root','','crud');

       //Button Action Click

       if(isset($_POST['save'])){
       	$name=$_POST['name'];
       	$address=$_POST['address'];

      //Mysqli Query
      
      $query = "INSERT INTO info(name,address)VALUES('$name','$address')";

      
      //buitin function for query insert
      mysqli_query($db,$query);

     $_SESSION['msg']="Address Saved";
      
      header('location:index.php');        

       }

       //upate data
       if (isset($_POST['update'])) {
       	  $name=$_POST['name'];
       	  $address=$_POST['address'];
       	   $id=$_POST['id'];

       	   mysqli_query($db,"UPDATE info SET name='$name', address='$address' WHERE id=$id");
       	   $_SESSION['msg']="Information Updated!!";
       	   header('location: index.php');
       }

       //Retrieve Data

       $results=mysqli_query($db,"SELECT * FROM info");

       
       //Delete Data
       if (isset($_GET['del'])) {
       	 $id = $_GET['del'];
       	 mysqli_query($db,"DELETE FROM info WHERE id = $id");
       	 $_SESSION['msg'] = "Information Deleted!!";
       	   header('location: index.php');
       }





?>