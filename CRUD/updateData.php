<!DOCTYPE html>
<head>
    <title>
</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
     .main{
            top:50%;
            left: 50%;
            height: 500px;
            width:400px;
            text-align: center;
            background-color: aquamarine;
            transform: translate(-50%, -50%);
            position: absolute;
        }
        h1{
            color: pink;
        }
        label{
            display: block;
        }
        input{
            margin-top: 20px;
            height: 30px;
            width:300px;
            background-color: #fff;
            color:black;
            border-radius: 5px;
        }
        input[type=submit]{
            height: 40px;
            width:100px;
            background-color: darkblue;
            color: white;
            cursor: pointer;
        }
    </style>
    </head>
  <body>

  <?php

  session_start();
  
  ?>

    <?php

    if(isset($_GET['id'])){
        $connection = mysqli_connect("localhost","root","","mobile");
        $id = $_GET['id'];
        $fetch_data = "SELECT * FROM data WHERE id='$id'";
        $fetch_data_run = mysqli_query($connection,$fetch_data);

        if(mysqli_num_rows($fetch_data_run)>0)
        {
          foreach($fetch_data_run as $row)
          {
            ?>
                <div class="main">
                <form action="connect.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name</label>
                <input type="text" id="name"  name="name" placeholder="write your name here" value="<?php echo $row['name']; ?>">
                <br>
                <br>
                <label for="company">Company</label>
                <input type="text" id="company" name="company" placeholder="write mobile company" value="<?php echo $row['company']; ?>">
                <br>
                <br>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Price of mobile" value="<?php echo $row['price']; ?>">
                <br>
                <br>
                <button type="submit" name="update_btn" class="btn btn-info">Update </button>
            </form>
          </div>
        
        <?php
            
          }
        }
        else{
            echo "No Record Found";
        }
    }
    else {
            echo "Something went Wrong";
        
    }
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>