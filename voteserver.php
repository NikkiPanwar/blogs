<?php 
session_start();


$con=mysqli_connect('localhost','root','','mydb');

if(isset($_REQUEST['addparty']))
{
    $p=$_REQUEST['addparty'];
    
$q="select * from party2 where pname='$p' ";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);
if($x>0)

    echo"<h2><center>party already exits with party name =$p</center></h2>";
else 
{

$q="insert into party2(pname) values('$p')";
mysqli_query($con,$q) or die ("could not exexute".mysqli_error($con));
echo"<h3><center>party added successfully with prty name=$p</h3></center>";
}

}

if(isset($_REQUEST['removeparty']))
{
$p=$_REQUEST['removeparty'];

$q="delete from party2 where pname='$p'";
mysqli_query($con,$q)or die("could not execute "/mysqli_error($con));
echo"remove party successfully with party name='$p' ";

}

if(isset($_REQUEST['addvoter']))
{
    $d=$_REQUEST['addvoter'];
    $a=explode(",",$d);
    print_r($a);
    
$password=rand(1000,9999);

$q="select * from voter2 where email='$a[0]' && name='$a[1]' ";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);

if($x>0)
{

 echo"<h2><center>vote already exits with name =$n</center></h2>";
}
 else 

$q="insert into voter2(name,email,password) values('$a[0]','$a[1]','$password')";
mysqli_query($con,$q) or die ("could not execute".mysqli_error($con));
echo"<h3><center>now you are listed as voter &name , $password is your password</h3></center>";

}


if(isset($_REQUEST['removevoter']))
{

    $d=$_REQUEST['removevoter'];

$q="delete from voter2 where  email='$a[0]' && name='$a[1]' ";
mysqli_query($con,$q)or die("could not execute "/mysqli_error($con));
echo"remove party successfully with party name='$n' ";
}

else if(isset($_REQUEST['getlogin']))
{
    $d=$_REQUEST['getlogin'];
    $ar=explode(",",$d);
    print_r($ar);

$q="select * from voter2 where email='$ar[0]'&& password='$ar[1]'";
$rs=mysqli_query($con,$q);
$r=mysqli_fetch_array($rs);
print_r($r);
$x=mysqli_num_rows($rs);
if($x>0)
  
{

echo "<br>Login Successfully";
header('location:votenow.php');
   
}

else

echo "<br>Invalid user name or password";
} 

{
    session_start();
    if(isset($_SESSION['loguser']))  {
        echo"false ";
    }
    else {
        echo"<br>true";
    }
}
?>