<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Web - Calculator</title>
    <style>
        form {
        display: flex;
        align-items: center;
        flex-direction: column;
        }

        h2 {
        text-align: center;
        }
        output[for="foutmelding"]{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php 

$operation = $_POST["operation"] ?? '';

$result = '';
$foutmelding_num1 = '';
$foutmelding_num2 = '';

$num1 = $_POST["num1"] ?? '';
$num2 = $_POST["num2"] ?? '';
if (isset($_POST['operation'])) {
    if (is_float($num1) && is_float($num2)) {
        switch ($_POST['operation']) {
            case 'add': 
                $result = $num1 + $num2;
                break;
            case 'subtract': 
                $result = $num1 - $num2;
                break;
            case 'multiply': 
                $result = $num1 * $num2;
                break;
            case 'divide': 
                if ($num2 == 0) {
                    $foutmelding_num2 = "getal 2 mag geen 0 zijn"; 
                } else {
                    $result = $num1 / $num2;
                }
                break;  
            case 'modulo': 
                if ($num2 == 0) {
                    $foutmelding_num2 = "getal 2 mag geen 0 zijn"; 
                } else {
                    $result = $num1 % $num2;
                }
                break;
        }
    } elseif (!is_numeric($num1)) {
        $foutmelding_num1 = "Error opgevangen: Input moet een getal zijn";
    } elseif (!is_numeric($num2)) {
        $foutmelding_num2 = "Error opgevangen: Input moet een getal zijn";    
    }
}
?>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

<div>
    <label for="num1">Getal 1</label>
    <input type="text" name="num1" id="num1" value="<?php echo $num1?>">
    <output type="text" for="foutmelding" id="result"> <?php echo $foutmelding_num1 ?></output>
</div>

<div>
    <label for="num2">Getal 2</label>
    <input type="text" name="num2" id="num2" value="<?php echo $num2?>">
    <output type="text" for="foutmelding" id="result"> <?php echo $foutmelding_num2 ?></output>
</div>

<div>
    <label for="result">Resultaat</label>
    <output type="text" for="$num1 $num2" id="result"> <?php $result ?></output>
</div>

<div>
    <input type="submit" value="add" name="operation">
    <input type="submit" value="subtract" name="operation">
    <input type="submit" value="multiply" name="operation">
    <input type="submit" value="divide" name="operation">
    <input type="submit" value="modulo" name="operation">
</div>
</form>
</body>
</html>
