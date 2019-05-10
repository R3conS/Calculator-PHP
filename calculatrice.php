<?php
session_id("session1");
session_start();
?>

<html>
<head>
	<title>Calculatrice</title>
	<link type="text/css" rel="stylesheet" href="style01.css" />
</head>
<body>
<?php
		global $text;
			$text=666;
		if (!isset($_SESSION["NUMBER"])) $_SESSION["NUMBER"]="";
		if (!isset($_SESSION["OPERATEUR"])) $_SESSION["OPERATEUR"]=""; 
		if (!isset($_SESSION["VAR"])) $_SESSION["VAR"]= 0;
		if (!isset($_SESSION["DECI"])) $_SESSION["DECI"]=FALSE;
		if (!isset($_SESSION['$ID'])) $_SESSION['$ID']=false;  
			function fact($num)
				{
					$res = 1;
					for ($n = $num; $n >= 1; $n--) 
					$res = $res*$n;
					return $res;
				}
			function calcule($x,$op,$y)
				{
					switch($op)
						{
							case "+" : $res=$x+$y;break;
							case "-" : $res=$x-$y;break;
							case "*" : $res=$x*$y;break;
							case "/" : if($y==0)  $res=0; else $res=$x/$y;break;
							case "^" : $res=$x**$y;break;
							case "=" : $res=$y;break;
						}
					return $res;
				}

				$_SESSION["virgule"]=false;

				if (isset($_POST["button"])) 
					$button = trim($_POST["button"]); 
				else
					$button ="";


				switch($button)
					{
					case "0" : if ($_SESSION['$ID'])
					{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
					else
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
					break;
					case "1" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
							else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
						break;
					case "2" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
							else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
						break;
					case "3" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
									else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
						break;
					case "4" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
									else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
						break;
					case "5" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
								else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
					break;
					case "6" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
								else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
					break;
					case "7" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
							else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
					break;
					case "8" : if ($_SESSION['$ID'])
							{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
							else
							$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
							
					break;
					case "9" : if ($_SESSION['$ID'])
									{$_SESSION["NUMBER"]=$button;$_SESSION['$ID']=false;}
							else
									$_SESSION["NUMBER"]=$_SESSION["NUMBER"].$button;
					break;
		
					case "+" :  $_SESSION["OPERATEUR"]="+";
					$_SESSION["VAR"]=$_SESSION["NUMBER"];
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"]."+";
					$text=$text.$_SESSION["NUMBER"]."+";
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "-" :  $_SESSION["OPERATEUR"]="-";
					$_SESSION["VAR"]=$_SESSION["NUMBER"];
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"]."-";
					$text=$text.$_SESSION["NUMBER"]."-";					
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "*" :  $_SESSION["OPERATEUR"]="*";
					$_SESSION["VAR"]=$_SESSION["NUMBER"];
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"]."*";
					$text=$text.$_SESSION["NUMBER"]."*";
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "/" :  $_SESSION["OPERATEUR"]="/";
					$_SESSION["VAR"]=$_SESSION["NUMBER"];
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"]."/";
					$text=$text.$_SESSION["NUMBER"]."/";
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "^" : $_SESSION["OPERATEUR"]="^";
					$_SESSION["VAR"]=$_SESSION["NUMBER"];
					$_SESSION["NUMBER"]=$_SESSION["NUMBER"]."^";
					$text=$text.$_SESSION["NUMBER"]."^";
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "!" : $_SESSION["OPERATEUR"]="!";
					$_SESSION["NUMBER"]=fact($_SESSION["NUMBER"]);
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "=" :	$_SESSION["NUMBER"]=calcule($_SESSION["VAR"],$_SESSION["OPERATEUR"],$_SESSION["NUMBER"]);
					$_SESSION['$ID']=true;
					$_SESSION['DECI']=false;
					break;
					case "." :	if ($_SESSION['DECI']==false)
						{
						$_SESSION["NUMBER"]=$_SESSION["NUMBER"] .".";
						$_SESSION['DECI']=true;
						}
						break;
					case "(" :
						$_SESSION["NUMBER"]="(".$_SESSION["NUMBER"];
						$_SESSION['DECI']=true;
					break;
					case ")" :
						$_SESSION["NUMBER"]=$_SESSION["NUMBER"].")";
						$_SESSION['DECI']=true;						
					break;
					case "C" :	session_destroy();
					$_SESSION["C"]="";
					session_start();
					break;
	} 

	function affiche(){
		if (isset($_SESSION["NUMBER"])) echo $_SESSION["NUMBER"];}

?>

<H1 align="center">Calculatrice</H1>

<table border="12" align="center">
<tr>
	<td>
<table>
	<td colspan="5" align="center" ><table border="10" width="100%" height="100%"><tr><td align="right" class="affiche"><?php affiche() ?></td></tr></table></td>
<tr height="60">
</tr>
<form action="calculatrice.php" method="post"> 
<tr>
	<td align="center"> <input type="submit" class="buttons" name="button" value="7"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="8"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="9"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="+"></td>
</tr>
<tr>
	<td align="center"> <input type="submit" class="buttons" name="button" value="4"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="5"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="6"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="-"></td>
</tr>
<tr>
	<td align="center"> <input type="submit" class="buttons" name="button" value="1"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="2"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="3"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="*"></td>
</tr>
<tr>
	<td align="center"> <input type="submit" class="buttons" name="button" value="0"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value=". "></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="="></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="/"></td>
</tr>
<tr>
	<td align="center"> <input type="submit" class="buttons" name="button" value="!"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="^"></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value="("></td>
	<td align="center"> <input type="submit" class="buttons" name="button" value=")"></td>
</tr>
<tr>
	<td colspan="4" align="center" width="60%"> <input type="submit" name="button"class="buttons" value="C"></td>
</tr>
</table>
	</td>
</tr>
</table>
</form>
</body>

</html>
