<?php
/*
    echo "Hola";
    echo "<h1>Hola</h1>";
    $suma = 5+5;
    echo "<h3>El resultado es: ".$suma."</h3>";
?>


    <p>El resultado es: <strong> <?php echo $suma;?> </strong></p>*/

    if(isset($_GET['num1'])){
        echo "Vienes de un GET";
    }
    else{
        header('Location: index.html');
        exit;
        echo "No xd by Ezequiel";
    }

    $numA = $_GET["num1"];
    $numB = $_GET["num2"];
    $suma = $numA + $numB;

    echo "El resultado es: " . $suma;
    echo "<p class='rojo negritas'>El resultado es:".$suma."</p>";

    ?>