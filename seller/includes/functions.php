<?php
//This file contians all the php functions for seller side. Function contains "CURD".

// This Function Logouts seller
if(isset($_POST['logout'])){
    session_start();
   
    unset($_SESSION["super-store-seller"]);
       header("Location: login.php");
}


//This Function login the seller
if(isset($_POST['login'])){
 // username and password sent from form 

 $myusername = $_POST['email'];
 $mypassword = $_POST['password']; 
 
 $sql = "SELECT * FROM seller_tbl WHERE email = '$myusername' AND password = '$mypassword'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 
 $count = mysqli_num_rows($result);
 

 if($count == 1) {

    $_SESSION['super-store-seller'] = $row['id'];

    header("location: index.php");
 }else {
    $error = "Your Email or Password is invalid";
 }
}



//This function add new Store
if(isset($_POST['add_store'])){
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $user_id = $login_session_id;
   $address = $_POST['address'];
   $description = $_POST['description'];
   $status = "Unapproved";
   $status_desc = "Greeting, Dear customer, We are glad to know the your are intrested in doing business with us. We have recived your request for opening store with us. Currently it is under review. You can Start your business after your store is approved";

      $sql = "INSERT INTO store_tbl (name, phone, email, user_id, address, description,status, status_description)
   VALUES ('$name', '$phone', '$email', '$user_id', '$address', '$description', '$status', '$status_desc')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('Congragulations $login_session_name !. Your store is Now Registered with us and is now under review. Keep Visiting your panel for further information. Thanks');</script>
     <script type='text/javascript'>window.open('index.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }


   //This function add new Category
if(isset($_POST['add_category'])){
   $name = $_POST['name'];

      $sql = "INSERT INTO category_tbl (name, store_id)
   VALUES ('$name', '$store_id')";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }

      //This function Update Existing Category
if(isset($_POST['update_cat'])){
   $name = $_POST['name'];
   $cat_id = $_POST['update_cat'];
      $sql = "UPDATE category_tbl SET
      name = '$name'
      WHERE id = $cat_id ";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }

       //This function Delete Existing Category
if(isset($_POST['delete_cat'])){
   $cat_id = $_POST['delete_cat'];
      $sql = "DELETE FROM category_tbl WHERE id = $cat_id ";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }


   
//This function add new Product
if(isset($_POST['add_product'])){
   $name = $_POST['name'];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $description = $_POST['description'];
   $tem_name_for_file = $store_id . '-' .$name . '-' . $category;
   
   $image = $_FILES['image']['name'];
   $file_basename = substr($image, 0, strripos($image, '.')); // get file extention
	$file_ext = substr($image, strripos($image, '.')); // get file name
   $newfilename = ($tem_name_for_file) . $file_ext;
   

      $sql = "INSERT INTO product_tbl (name, price, description, image, cat_id, store_id)
   VALUES ('$name', '$price', '$description', '$newfilename', '$category', '$store_id')";
   
   if ($conn->query($sql) === TRUE) {
      move_uploaded_file($_FILES["image"]["tmp_name"], "../products-images/" . $newfilename);
     echo "
     <script type='text/javascript'>window.open('products.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }

          //This function Delete Existing Product
if(isset($_POST['delete_pro'])){
   $pro_id = $_POST['delete_pro'];
      $sql = "DELETE FROM product_tbl WHERE id = $pro_id ";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('products.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }





     
//This function Update Existing Product
if(isset($_POST['update_product'])){
   $name = $_POST['name'];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $description = $_POST['description'];
   $tem_name_for_file = $store_id . '-' .$name . '-' . $category;
   $image = $_FILES['image']['name'];

   if($image != ""){
   $file_basename = substr($image, 0, strripos($image, '.')); // get file extention
	$file_ext = substr($image, strripos($image, '.')); // get file name
   $newfilename = ($tem_name_for_file) . $file_ext;

   $sql = "UPDATE product_tbl SET
   name = '$name',
   price = '$price',
   description = '$description',
   image = '$newfilename',
   cat_id = '$category'
   WHERE id = '$pro_id'";
   
   if ($conn->query($sql) === TRUE) {
      move_uploaded_file($_FILES["image"]["tmp_name"], "../products-images/" . $newfilename);
     echo "
     <script type='text/javascript'>window.open('products.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
 
   }

   else{
      $sql = "UPDATE product_tbl SET
      name = '$name',
      price = '$price',
      description = '$description',
      cat_id = '$category'
      WHERE id = '$pro_id'";
      
      if ($conn->query($sql) === TRUE) {
        echo "
        <script type='text/javascript'>window.open('products.php','_self')</script>
        ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
   

   }

?>