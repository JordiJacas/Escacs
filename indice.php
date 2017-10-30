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
		<input type="text" name="posicion" value="a8">
		<input type="submit" name="submit">
	</form>

	<br>

	<table>
	<?php

		$pos = strtoupper ($_POST['posicion']);
		$letras = "A";

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
					if($letras.$c == $pos){
						echo "<td class='negres' value='".$letras.$c."'><img src='torre.png'></td>";
					}else{
						echo "<td class='negres' value='".$letras.$c."'></td>";
					}
				}else{
					if($letras.$c == $pos){
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