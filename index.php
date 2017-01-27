<?php 
include "cube.php";

if(!$_POST)
{
	$cube= new cube();
	session_start();
	$_SESSION["cube"]=$cube;
}

{
	session_start();
	$cube=$_SESSION["cube"];
	if($_POST["dropdown"]=="Set")
	{	
		$msg = $cube->setCube($_POST["x"],$_POST["y"],$_POST["z"],$_POST["w"]);
		if ($msg == '')
		{
			echo "Set ok (".$_POST["x"].",".$_POST["y"].",".$_POST["z"].")=".$_POST["w"];
		}
		else
		{
			echo "Error: ".$msg;
		}
	}			
	if($_POST["dropdown"]=="Sum")
	{
		$i[0]=$_POST["x_init"];
		$i[1]=$_POST["y_init"];
		$i[2]=$_POST["z_init"];
		$f[0]=$_POST["x_final"];
		$f[1]=$_POST["y_final"];
		$f[2]=$_POST["z_final"];
		echo $r=$cube->queryCube($i,$f);
	}	
	$_SESSION["cube"]=$cube;		
}
if(!$_POST)
{
?>
	<html>
		<head>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		</head>
	<script>
	$( document ).ready(function() {
		
		
	    
		$('#dropdown').change(function(){
	    
		var value=$('#dropdown').val();
		if(value=="Set")
		{
			$('#setdiv').show();
			$('#querydiv').hide();
			
		}
		if(value=="Sum")
		{
			$('#querydiv').show();
			$('#setdiv').hide();
		}
		
	});
		
		$('#btn_send').click(
			function(){
				var valueselect=$('#dropdown').val();				
				if(valueselect=="")
				{
					alert("Select operation")
					return false;
				}
				
				if(valueselect=="Set")
				{
					var x=$('#x').val();
					var y=$('#y').val();
					var z=$('#z').val();
					var w=$('#w').val();
					
					if( x=="" || y=="" || z=="" || w=="")
					{
						alert("All values must be filled")
						return false;
					}
				}
				if(valueselect=="Sum")
				{
					var query1=$('#x_init').val();
					var query2=$('#y_init').val();
					var query3=$('#z_init').val();
					var query4=$('#x_final').val();
					var query5=$('#y_final').val();
					var query6=$('#z_final').val();
					
					if(x_init=="" || y_init=="" || z_init=="" || x_final=="" || y_final=="" || z_final=="" )
					{
						alert("All values must be filled")
						return false;
					}
				}	
						
			$.post('index.php', $('#form').serialize(), function(data) {
	         $("#response" ).html(data);
	       }
	       
	    );
		
	});

	});
	</script>

	<form id="form" action="index.php" method="post" >
	<fieldset>
	<select id="dropdown" name="dropdown">
	<option value="" selected>Select operation</option>
	<option value="Set">Set or update</option>
	<option value="Sum">Sum</option>
	</select>

	<br><br>
	<div id="setdiv">
	<label for="set">Set/update:</label><br>
	<input id="x" type="text" name="x" placeholder="x" /><br>
	<input id="y" type="text" name="y" placeholder="y" /><br>
	<input id="z" type="text" name="z" placeholder="z" /><br>
	<input id="w" type="text" name="w" placeholder="w" /><br>
	</div>
	<br><br>
	<div id="querydiv">
	<label for="query">Sum:</label><br>
	<input id="x_init" type="text" name="x_init" placeholder="x1" /><br>
	<input id="y_init" type="text" name="y_init" placeholder="y1" /><br>
	<input id="z_init" type="text" name="z_init" placeholder="z1" /><br>
	<input id="x_final" type="text" name="x_final" placeholder="x2" /><br>
	<input id="y_final" type="text" name="y_final" placeholder="y2" /><br>
	<input id="z_final" type="text" name="z_final" placeholder="z2" /><br>

	</div>
	<br>
	<br>
	</fieldset>


	<input id="btn_send" type="button" name="btn_send" value="Send"/>

	</form>
	<div id="response">

	</div>
<?php
}
?>






