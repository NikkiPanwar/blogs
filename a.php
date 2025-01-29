<?php ob_start();?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"  crossorigin="anonymous"></script>

<script>

function addparty(op,form) {
        var p=form.p.value;

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4)
            {
                document.getElementById("p").value="";
                document.getElementById("msg").innerHTML=this.responseText;
        }
    };

if(op=="add")
xmlhttp.open("GET","voteserver.php?addparty="+p,true);
if(op=='remove')
xmlhttp.open("GET","voteserver.php?removeparty="+p,true);
xmlhttp.send();
}

function addvoter(op,form)
    {
        var n=form.n.value;
        var e=form.e.value;
data=[n,e];

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4)
            {
                document.getElementById("n").value="";
                document.getElementById("e").value="";
                document.getElementById("msg").innerHTML=this.responseText;
        }
    };

if(op=="add")
xmlhttp.open("GET","voteserver.php?addvoter="+data,true);
if(op=='remove')
xmlhttp.open("GET","voteserver.php?removevoter="+data,true);

xmlhttp.send();
    }


function login()
    {
       
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4)
            {
                document.getElementById("data").innerHTML=this.responseText;
        }
    };

xmlhttp.open("GET","login.php",true);

xmlhttp.send();
    }


    function loginNow(form)
    {
       var u=form.e.value
       var p=form.p.value
       data=[u,p];

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4)
            {
                document.getElementById("data").innerHTML=this.responseText;
        }
    };

xmlhttp.open("GET","voteserver.php?getlogin="+data,true);

xmlhttp.send();
   
}


function votenow()
    {
          var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4)
           {
            if(this.responseText=="true")
            {
                document.getElementById("data").innerHTML=this.responseText;
            }
            else 
       login()
    }
};

xmlhttp.open("GET","voteserver.php",true);

xmlhttp.send();
    }

</script>


<div class="row">
    <div class="col-md-3" style="border:2px solid black;height:180px;padding:0px;">

      <img src="1.jpg"  height="100%" width="100%"></div>

    
    <div class="col-md-9" style="background-color:orange; height:180px;">
<h1 ><center>ONLINE VOTING SYSTEM </center></h1>
<hr><h2><center><marquee scrollamount='20'>Vote For Nation  &emsp; &emsp;
     &emsp;Vote For Nation</marquee></center></h2><hr>
</div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<div class="container-fluid">
          <a class="navbar-brand" href="#">OVS</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="a.php">Home</a></li>   

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">About</a></li>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#" onclick="votenow()">vote now</a></li>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">contact</a></li>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#" onclick="login()">login</a></li>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">Register</a></li>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="logout.php"></a></li> 

<?php 
session_start();
if(isset($_SESSION['loguser']))
{
    ?>
<li class="nav-item">
 <h6>welcome &emsp;&emsp;<?php echo $_SESSION['loguser'] ?> &emsp;
<button class="btn btn-danger">logout</button>        
</li>
<?php 
}
else 
{
?>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#" onclick="login()">login</a>
</li>
<?php 
}
?>

</ul>
</div>
</div>
</nav>

<center><h1 id="msg"></h1></center>
<hr>
<div id="data">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-4" style="border:2px solid red;height:300px;width:400px;">

<h2><center>ADD/REMOVE PARTY</center></h2>

<form>
    Enter party name 
<input type="text" class="form-control" name="p" id="p"><br>
   
<input type="button"  class="btn btn-success" value="add"
 onclick="addparty('add',this.form)">&emsp;</button>

<input type="button" class="btn btn-danger" value="remove" onclick="addparty('remove',this.form)">

</button>
</form>
</div>

<div class="col-md-6" style="border:2px solid green;height:300px;width:400px;">
      <h2><center>ADD/REMOVE VOTE</center></h2> <hr> 
<form>
    Enter name 
    <input type="text" name="n" class="form-control" id="n" ><br>
    Enter email 
    <input type="text" name="e" class="form-control" id="e" ><br>

 <input type="button"  value="add" class="btn btn-success" onclick="addvoter('add',this.form)">&emsp;</button>

 <input type="button" value="remove" class="btn btn-danger" onclick="addvoter('remove',this.form)"></button>
 
</form>
</div>
</div>
</div>
</body>
</html>