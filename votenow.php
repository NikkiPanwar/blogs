<html>

    <div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
    <div class="col-md-4" style="box-shadow:2px 2px 10px 2px;">

    <form>
<center><h5>vote your party</h5></center><hr>

<?php 
                    session_start();

$con=mysqli_connect('localhost','root','','mydb');
$q="select * from party2";
$rs=mysqli_query($con,$q);

while($r=mysqli_fetch_array($rs))
{
?>

<div class="form-check">
<input class="form-check-input" type="radio" name="pname" value="<?php echo"$r[1]";?>" 
id="flexRadioDefaulti">

<?php echo "$r[1]";?>
</label>
</div>

<?php
 }
  
if(isset($_REQUEST['votenow']))
{

$pname=$_REQUEST['votenow'];
$e=$_SESSION['loguser'];
$d=date('d-m-y');


$q="select * from votenow2 where email='$e'";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);
if($x>0)

    echo"<h2><center> vote already exits with email='$e'</center></h2>";
else 
{
 $q="insert into votenow2(pname,email,dt) values('$pname','$e','$d')";
    mysqli_query($con,$q) or die ("could not exexute".mysqli_error($con));
    echo"<h3><center>vote done successfully</h3></center>";
 }
}
?>
<input type="button" class="btn btn-success" onclick="votenow(this.form)" value="vote"></button>
<br>
</form>
</div>
</html>