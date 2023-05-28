<?php

session_start();
$connection = mysqli_connect("localhost","root","","mobile");

if (isset($_POST['insert-btn']))
{
$name = $_POST['name'];
$company =$_POST['company'];
$price = $_POST['price'];


$insert_query = "INSERT INTO  data(name,company,price)VALUES('$name','$company','$price')";
$insert_query_run = mysqli_query($connection,$insert_query);

if($insert_query_run)
{
    echo "Data Inserted successfuly";
}

else
{
    echo "data not inserted";
}
}

if(isset($_POST['update_btn']))
{

$user_id = $_POST['id'];
$name = $_POST['name'];
$company =$_POST['company'];
$price = $_POST['price'];

$update = "UPDATE data SET name='$name', company='$company', price='$price' WHERE id='$user_id'";
$update_query_run = mysqli_query($connection,$update);


if($update_query_run)
{
    $_SESSION['status']= "Data Updated Successfully";
    
}
else{
    $_SESSION['status']= "Data Not Inserted Successfully";
}

}


/* delete code */

if(isset($_POST['delete_btn']))
{
    $user_id = $_POST['id'];

    $delete = "DELETE FROM data WHERE id='$user_id'";
    $delete_query_run = mysqli_query($connection,$delete);

    if($delete_query_run)
    {
        $_SESSION['status']="Data Deleted Successfully";
    }
    else{
        $_SESSION['status']="Data not deleted successfully";
    }
}

?>


