<!DOCTYPE html>
<html lang="en">
<head>
  <title>IOT</title>
  <meta charset="utf-8">
    <meta http-equiv="refresh" content="5"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <h2 class="text-primary text-center my-3">Vitavox Smart Glove Interface</h2>
    <div class="row">
        <div class="col-md-12">
<table class="table table-bordered table-sm">
    <tr class="table-primary">
        <th>S.No</th>
        <th>Movement Status 1</th>
        <th>Movement Status 2</th>
        <th>Movement Status 3</th>
        <th>Flex Status 1</th>
        <th>Flex Status 2</th>
        <th>Heart Rate</th>
        <th>Temperature</th>
        <th>Reading time</th>
    </tr>
<?php
include("connection.php");
$sql="select * from vellore_glove order by id desc";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $value1=$row["value1"];
$value2=$row["value2"];
$value3=$row["value3"];
$value4=$row["value4"];
$value5=$row["value5"];
$value6=$row["value6"];
$v5=$row["v5"];
$reading_time=$row["reading_time"];

if($value1 >= 5.00)
{
    $v1 = "I need water";
    $v2 = "Normal";
}
else if($value1 <= -5.00)
{
    $v2 = "Hello, Nice to meet you";
    $v1 = "Normal";
}
else
{
    $v1 = "Normal";
    $v2 = "Normal";
}
if($value2 <= -5.00)
{
    $value2 = "I need help";
}
else
{
    $value2 = "Normal";
}
if($value3 > 3000)
{
    $value3 = "I am Unwell";
}
else
{
    $value3 = "Normal";
}
if($value4 > 3000)
{
    $value4 = "I'm Feeling Hungry";
}
else
{
    $value4 = "Normal";
}
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$v1?></td>
            <td><?=$v2?></td>
            <td><?=$value2?></td>
            <td><?=$value3?></td>
            <td><?=$value4?></td>
            <td><?=$v5?></td>
            <td><?=$value6?> &#8451;</td>
            <td><?=$reading_time?></td>
        </tr>
        <?php
    $i++;
    }
}
?>
</table>
        </div>
    </div>
</div>

</body>
</html>
