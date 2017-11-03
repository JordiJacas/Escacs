<html>
<head>
	<title>Escacs</title>
	<style>
		
	td{
		width: 50px;
		height: 50px;
		border: 2px solid black;
		text-align: center;
	}
	.negres{
		background: black;
	}

	.letras{
		border: 0px;
		text-align: center;
	}
	img{width: 40px;
		height: 40px;}


	</style>
</head>
<body>
	<form action = "" method="post">
		Escriure Posicion: <br>
		<input type="text" name="posicion" value="">
		<input type="submit" name="submit" value="Move">
	</form>

	<br>

	<table>
	<?php
		session_start();
		
		if(!isset($_SESSION["torre_pos"])){
			$_SESSION["torre_pos"] = 'A8';
		}else{
			$lastPos = $_SESSION["torre_pos"];	
			$_SESSION["torre_pos"] = strtoupper($_POST['posicion']);
		}
			
		$letras = "A";

		if(substr($lastPos, 0,1) == substr($_SESSION["torre_pos"], 0,1) or substr($lastPos, 1,1) == substr($_SESSION["torre_pos"], 1,1)){
			echo "La torre s'ha mogut correctament";
		}else{
			echo "La torre no es pot moure a ".$_SESSION["torre_pos"];
			$_SESSION["torre_pos"] = $lastPos;
		}

		echo "<tr>";
			for($n=0;$n<=8;$n++){
				echo "<td class='letras'>".$n."</td>";
			}
		echo "</tr>";	
		for($f=1;$f<=8;$f++){
			echo "<tr>";

			echo "<td class='letras'>".$letras."</td>";
			
			for($c=1;$c<=8;$c++){
				if(($f%2==0 && $c%2==0) | ($f%2!=0 && $c%2!=0)){
					if($letras.$c == $_SESSION["torre_pos"]){
						echo "<td class='negres' value='".$letras.$c."'><img src='torre.png'></td>";
					}else{
						echo "<td class='negres' value='".$letras.$c."'></td>";
					}
				}else{
					if($letras.$c == $_SESSION["torre_pos"]){
						echo "<td value='".$letras.$c."'><img src='torre.png'></td>";
					}else{
						echo "<td value='".$letras.$c."'></td>";
					}
				}
			}
			echo "</tr>";
			$letras++;
		}
	?>
	</table>
</body>
</html>