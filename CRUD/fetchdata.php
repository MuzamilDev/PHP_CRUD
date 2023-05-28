<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    table{
        margin:auto;
    }
    </style>
    </head>
    <body>
        <table border="2">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>name</th>
                    <th>Company</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $con = mysqli_connect("localhost","root","","mobile");
                 $sql = "SELECT * FROM data";
                 $fetch_data = mysqli_query($con,$sql);

                 if(mysqli_num_rows($fetch_data)> 0)
                 {
                    foreach($fetch_data as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['company']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="updateData.php?id=<?php  echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="connect.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        

                    <?php
                    }
                }
                    else{
                        ?>
                        <tr><td colspan="4">NO record Found</td></tr>
                        
                    <?php
                    }
                    ?>
                
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>