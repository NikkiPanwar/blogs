<?php
$con=mysqli_connect('localhost','root','','mydb');

if(isset($_REQUEST['cid']))
{
$id=$_REQUEST['cid'];

$q="select * from state where cid='$id'";
$rs=mysqli_query($con,$q);

while($r=mysqli_fetch_array($rs))
     {
    echo"<option value='$r[0]'>$r[2]</option>";
     }
}

if(isset($_REQUEST['ctid']))
{
    $id=$_REQUEST['ctid'];

$q="select * from city where sid='$id'";
$rs=mysqli_query($con,$q);

while($r=mysqli_fetch_array($rs))
{
    echo"<option value='$r[0]'>$r[2]</option>";
}    
}

if(isset($_REQUEST['aid']))
{
    $id=$_REQUEST['aid'];

$q="select * from area where ctid='$id'";
$rs=mysqli_query($con,$q);

while($r=mysqli_fetch_array($rs))
    {
    echo"<option value='$r[0]'>$r[2]</option>";
     }    
}
?>