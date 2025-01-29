<html>
    <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"  crossorigin="anonymous"></script>

<script>

function getstate(cid)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState==4)
            {
document.getElementById("state").innerHTML=this.responseText;
        }
    };
xmlhttp.open("GET","server2.php?cid=" +cid,true);
xmlhttp.send();
}


function getcity(cid)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState==4)
            {
document.getElementById("city").innerHTML=this.responseText;
        }
    };
xmlhttp.open("GET","server2.php?ctid=" +cid,true);
xmlhttp.send();
}

function getarea(cid)
    {

        alert("Calling area")
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState==4)
            {
            
                alert(this.responseText)
document.getElementById("area").innerHTML=this.responseText;
        }
    };
xmlhttp.open("GET","server2.php?aid="+cid,true);
xmlhttp.send();
}

</script>
</head>
<body>

    <div class="count">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-5" style="border:2px solid orange;height:850px;width:400px;">

<center><h2>User Registration form</h2></center>
<form id="register" method="post">

<label>user name</label><br>
<input type="text" class="form-control" name="uname" id="uname"><br>

<label>password</label><br>
<input type="text" class="form-control" name="p" id="p"><br>

<label>email</label>
<input type="text" class="form-control" name="e" id="e"><br>

<label>phone no</label>
<input type="text" class="form-control" name="ph" id="ph">

<br>

<label>country</label>
<select class="form-select" onchange="getstate(this.value)"><br>

<?php 
$con=mysqli_connect('localhost','root','','mydb');

$sql="select * from country";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
    echo"<option value='$row[0]'>$row[1]</option>";
}
?>
</select>
<br>
<br>
<label>state</label>
<br>
<select id="state" class="form-select" onchange="getcity(this.value)">
  </select><br>

 <label>city</label>
 <br>
 <select id="city" class="form-select" onchange="getarea(this.value)">

</select><br>

<label>area</label><br>
<select id="area" class="form-select">

</select>

<button type="submit" class="btn btn-danger">submit</button>
<br><br>

</form>
</div>

<div class="col-md-4"></div>
</body>
</html>