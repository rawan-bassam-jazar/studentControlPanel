<?php 
$conn=mysqli_connect("localhost","root","","students");
if(isset($_POST["submit"])){
$name=$_POST['name'];
$address=$_POST['address'];
$reset="ALTER TABLE student AUTO_INCREMENT = 1";
$q=mysqli_query($conn,$reset);
$insert="INSERT INTO student (name,address)VALUES('$name','$address')";
$q=mysqli_query($conn,$insert);
}

if(isset($_POST["delete"])){
    $id=$_POST["id"];
    $del="DELETE FROM student WHERE id=$id";
    mysqli_query($conn,$del);
 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- css file -->
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="all">
    <div class="row">

<aside class="col-sm-3"  >
        <div id="panel" style="text-align:center ; background-color:grey; "  >
            <img src="images/logo.png" alt="" width="50%">
            <h3 class="py-3">Control Panel</h3>
            <form action="" method="post">
                <input type="text" name="name" id="" placeholder="Enter Student Name" class="form-control w-75 m-auto" >
                <br>
                <input type="text" name="address" id="" placeholder="Enter Student Address" class="form-control w-75 m-auto">
                <br>

                <button name="submit" class="btn btn-success">Add</button> <br><br>

                <input type="text" name="id" id="" placeholder="Enter Student ID" class="form-control w-75 m-auto"> <br>

                <button name="delete" class="btn btn-primary">Delete</button>


            </form>
        </div>
</aside>

    <main class="col-sm-9">
        <table border="2" style="width:100%;text-align:center">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
            </thead>

            <?php 
            $select="SELECT * FROM student";
            $a=mysqli_query($conn,$select);
            while($rows=mysqli_fetch_array($a)) {?>
            <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['address']?></td>
            </tr>

            <?php }?>
        </table>
    </main>

    </div>
    


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>