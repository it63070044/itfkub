<html>
<head>
    <title>ITF Lab</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'tangkabodee.mysql.database.azure.com', 'kakasoro11@tangkabodee', '0809009565Aa', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<br>
<div class="container">
    <table class= "table table-dark" width="1200" align="center" border="1">
        <thead class="thead-dark">
    <tr>
        <th width="300"> <div align="center">Name</div></th>
        <th width="300"> <div align="center">Comment </div></th>
        <th width="300"> <div align="center">Link </div></th>
        <th width="300"> <div align="center">ID</div></th>
    </tr>
    </thead>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
        <tbody>
                <tr>
            <td><?php echo $Result['Name'];?></td>
            <td><?php echo $Result['Comment'];?></td>
            <td><?php echo $Result['Link'];?></td>
            <td>
                <a href="edit.php?ID=<?php echo $Result['ID']?>" class="btn btn-outline-success" >เพิ่ม</a>
                <a href="del.php?ID=<?php echo $Result['ID']?>" class="btn btn-outline-danger"onclick="return confirm('Confirm data deletion?')">ลบ</a>
                </tr>
        </tbody>
<?php
}
?>
    </table>
    <button type="button" class="btn btn-outline-warning" onclick ="window.location.href='form.html'">ADD</button> 
<?php
mysqli_close($conn);
?>
    </body>
</html>
