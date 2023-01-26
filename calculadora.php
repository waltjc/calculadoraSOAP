<body>
   <form action="" method="post" >
	<input type="text" name="v1" placeholder="Valor 1" />
	<input type="text" name="v2" placeholder="Valor 2" />
		
	<input type="submit" name="operacao" value="+">     
	<input type="submit" name="operacao" value="-">     
	<input type="submit" name="operacao" value="*">     
	<input type="submit" name="operacao" value="/"> 
   </form> 
</body>

<?php
	require "nusoap.php";
	$clientcalc = new nusoap_client("http://www.dneonline.com/calculator.asmx?WSDL", 'wsdl');
	$a = isset($_POST["v1"]) ? $_POST["v1"] : '';
	$b = isset($_POST["v2"]) ? $_POST["v2"] : '';
	$op = isset($_POST["operacao"]) ? $_POST["operacao"] : '';

	switch($op){
		case "+":
			$resultado = $clientcalc->call("Add", array("intA" => "$a", "intB" => "$b"));
			echo 'Resultado: '.$resultado["AddResult"];
			break;
		case "-":
			$resultado = $clientcalc->call("Subtract", array("intA" => "$a", "intB" => "$b"));
			echo 'Resultado: '.$resultado["SubtractResult"];
			break;
		case "*":
			$resultado = $clientcalc->call("Multiply", array("intA" => "$a", "intB" => "$b"));
			echo 'Resultado: '.$resultado["MultiplyResult"];
			break;
		case "/":
			$resultado = $clientcalc->call("Divide", array("intA" => "$a", "intB" => "$b"));
			echo 'Resultado: '.$resultado["DivideResult"];
			break;
		}
?>