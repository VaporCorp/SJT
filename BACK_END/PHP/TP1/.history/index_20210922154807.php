<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mon premier TP de PHP</h1>
    <?php
        $maPremiereVariable = "1";
        $maSecondeVariable = &$maPremiereVariable; 
        echo "<p>Bonjour ! ", $maSecondeVariable, "</p>";
        echo "<p>Vous êtes bien reconnu !</p>";

        if($maPremiereVariable != 1){
            echo "<p>PROBLEME HOUSTON</p>";
        }
        else if($maPremiereVariable==0){
            echo "<p>T'y est presque mon reuf !</p>";
        }
        
        else{
            echo "<p>TOUT VA BIEN !</p>";
        }
    ?>   
</body>
</html>