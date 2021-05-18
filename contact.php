<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<style>
#a{background-color:lime;height:100px;margin:5px;}
#b,#c{background-color:cyan;height:600px;margin:5px;}
</style>


<script>
function ncheck()
{
	var nc,n;
	nc=/^[a-zA-Z ]+$/;
	n=document.getElementById("n").value;
	n=n.trim();
	if(!n.match(nc) || n.length==0)
	{
		document.getElementById("ns").innerHTML="**** check ***";
		return 'n';
	}
	else 
	{
		document.getElementById("ns").innerHTML="";
		return 'y';
	}
	
}
function phcheck()
{
	var pc,p;
	pc=/^[0-9]{10,10}$/;
	p=document.getElementById("ph").value;
	
	if(!p.match(pc) || p.charAt(0)<6)
	{
		document.getElementById("phs").innerHTML="**** check ***";
		return 'n';
	}
	else 
	{
		document.getElementById("phs").innerHTML="";
		return 'y';
	}
	
}

function echeck()
{
	var ec,e;
	ec=/^[a-zA-Z0-9._-]+\@[a-zA-Z0-9]+\.[a-zA-Z.]{2,6}$/;
	e=document.getElementById("e").value;
	
	if(!e.match(ec) )
	{
		document.getElementById("es").innerHTML="**** check ***";
		return 'n';
	}
	else 
	{
		document.getElementById("es").innerHTML="";
		return 'y';
	}
	
}


function acheck()
{
	var a;
	
	a=document.getElementById("a").value;
	a=a.trim();
	if( a.length<10)
	{
		document.getElementById("as").innerHTML="**** check ***";
		return 'n';
	}
	else 
	{
		document.getElementById("as").innerHTML="";
		return 'y';
	}
	
}


function show()
{
if(ncheck()=='y' && echeck()=='y' && phcheck()=='y' && acheck()=='y'  )
{
	
	document.getElementById("r").value="ok";

	}
	else
	{
	ncheck();
	echeck();
	phcheck();
	acheck();
	

	alert("check");
	}
}
</script>

<?php 
if(isset($_POST['s']) && !empty($_POST['r']))
{
	$n=$_POST['n'];
	$ph=$_POST['ph'];
	$e=$_POST['e'];
	$a=$_POST['a'];
	
	$b="name ".$n.' phone '.$ph.' email '.$e.' message '.$a;
	$h="messege by argus ltd";
	$s="thank for enquire at argus ltd";
	
	if(mail($e,$s,$b,$h))
	{
		if(mail('av673287@gmail.com' ,$s,$b,$h))
		{
			echo '<script> alert("thank for enquire")</script>';
		}
	}
	
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand text-white" href="#">FOOD ORDING </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item" > <a class="nav-link text-white" href="index.php">Home </a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="sign_up.php">Sign Up </a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="login.php">Login </a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="contact.php">Contact </a> </li>
	 
    </ul>
  </div>
</nav>



<div class="fluid-container">
	
	
	<div class="row">
				<div class="col-md-6">
					<div id="b">
				<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=argus%20academy&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies2.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embedding google maps in html</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
				
				
					</div>
				</div>
				<div class="col-md-6">
						<div id="c">
				<form action="" method="POST">
name: <input type="text" id="n" name="n" onblur="ncheck()">
<span id="ns"style="color:red"></span> 

<br><br>

phone <input type="text" id="ph" name="ph"maxlength="10"onblur="phcheck()">
<span id="phs"style="color:red"></span> 

<br><br>

email <input type="text" id="e" name="e"onblur="echeck()">
<span id="es"style="color:red"></span> 

<br><br>


message [min 10 character]<textarea id="a" name="a"onblur="acheck()" maxlength="50"></textarea>
<span id="as"style="color:red"></span> 

<br><br>

<input type="submit" name="s" onclick="show()">

<br><br>

<input type="text" id="r" name="r"readonly style="visibility:hidden;">
</form>
					</div>
				</div>
	</div>

</div>