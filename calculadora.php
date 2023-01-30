<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Calculadora</title>
  </head>
  <body>
    <div class="container mt-5">
      <form action="calculadora.php" method="post">
        <div class="form-group">
          <label for="num1">Primeiro número:</label>
          <input type="text" class="form-control" id="v1" name="v1">
        </div>
        <div class="form-group">
          <label for="num2">Segundo número:</label>
          <input type="text" class="form-control" id="v2" name="v2">
        </div>
        <div class="form-group">
          <label for="operacao">Operação:</label>
          <select class="form-control" id="operacao" name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
      </form>
    </div>
  </body>
</html>

<?php
	require "nusoap.php";
	$clientcalc = new nusoap_client("http://www.dneonline.com/calculator.asmx?WSDL", 'wsdl');
	$a = isset($_POST["v1"]) ? $_POST["v1"] : '';
	$b = isset($_POST["v2"]) ? $_POST["v2"] : '';
	$op = isset($_POST["operacao"]) ? $_POST["operacao"] : '';

	switch($op){
		case "soma":
			$resultado = $clientcalc->call("Add", array("intA" => "$a", "intB" => "$b"));
			echo '<center><h2>Resultado: '.$resultado["AddResult"].'</h2>';
			break;
		case "subtracao":
			$resultado = $clientcalc->call("Subtract", array("intA" => "$a", "intB" => "$b"));
			echo '<center><h2>Resultado: '.$resultado["SubtractResult"].'</h2>';
			break;
		case "multiplicacao":
			$resultado = $clientcalc->call("Multiply", array("intA" => "$a", "intB" => "$b"));
			echo '<center><h2>Resultado: '.$resultado["MultiplyResult"].'</h2>';
			break;
		case "divisao":
			$resultado = $clientcalc->call("Divide", array("intA" => "$a", "intB" => "$b"));
			echo '<center><h2>Resultado: '.$resultado["DivideResult"].'</h2>';
			break;
		}
?>
