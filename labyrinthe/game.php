<?php
session_start();
?>
<html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <p class="welcome text-center p-4"> 
        Welcome in the Labyrinth 
        <?php if(!empty($_SESSION['pseudo'])) {
            echo($_SESSION['pseudo']);
        } ?>
        !
    </p>

    <h1 class="text-center mt-5 mb-4 display-2"> The Labyrinth </h1>
    <div class = "tableau mx-auto p-4 text-center"> 
</html> 
<?php
$tableau=array(array());
// Fonction d'affichage du labyrinthe d'origine
    function drawInitTable(&$tableau){
        $labyrinthe = fopen('labyrinthe.txt', 'r');
        $tableau = array(array());
        for ($i=0; $i<=14; $i++) {
            $ligne = fgets($labyrinthe);
            echo($ligne."<br>");
            
            for ($j=0; $j<=14; $j++) {
                $tableau[$i][$j] = $ligne[$j];
            }
        }
        fclose($labyrinthe);
    }
//

// fonction du labyrinthe qui se réactualise
    function drawTable(&$tableau) {
        foreach($tableau as $v1) {
            echo("<br>");
            foreach($v1 as $v2) {
                echo($v2);               
            }
        }
    }
//

// Fonctions de déplacement dans le labyrinthe
    $x=0;
    $y=0;

    function MoveRight(&$x, &$y, &$tableau){
        $tableau[$x][$y] = "1";                 // retransforme l'ancienne case en 1
        if ($tableau[$x][$y+1] !="0") {
            $y+=1;
        } elseif ($tableau[$x][$y+1] ="W") {
            ?> <script> alert("You WINN !!"); </script> <?php
        }
        else{
            ?> <script> alert("It's a wall !"); </script> <?php
        }
    $tableau[$x][$y] = "X";     
}

    function MoveLeft(&$x, &$y, &$tableau){
        $tableau[$x][$y] = "1";
        if ($tableau[$x][$y-1] !="0" ||" ") {
            $y-=1;
        } else{
            ?> <script> alert("It's a wall !"); </script> <?php
        }
        $tableau[$x][$y] = "X";

    }

    function MoveUp(&$x, &$y, &$tableau){
        $tableau[$x][$y] = "1";
        if ($tableau[$x-1][$y] !="0") {
            $x-=1;
        } else{
            ?> <script> alert("It's a wall !"); </script> <?php
        }
        $tableau[$x][$y] = "X";

    }

    function MoveDown(&$x, &$y, &$tableau){
        $tableau[$x][$y] = "1";
        if ($tableau[$x+1][$y] !="0") {
            $x+=1;
        } else{
            ?> <script> alert("It's a wall !"); </script> <?php
        }
        $tableau[$x][$y] = "X";
 
    }
//

// Fonction recommencer
    function Restart(&$tableau){
        drawInitTable();
    }
// 

// Si déplacement utiliser afficher le tableau raffraichit, sinon afficher le tableau de base
if ((isset($_POST["UP"])) || (isset($_POST["LEFT"])) || (isset($_POST["RIGHT"])) || (isset($_POST["DOWN"]))) {
    if(isset($_POST["UP"])) {
        MoveUp($x, $y, $tableau);
    
    }
    elseif(isset($_POST["LEFT"])) {
        MoveLeft($x, $y, $tableau);
    
    }
    elseif(isset($_POST["RIGHT"])) {
        MoveRight($x, $y, $tableau);
    
    }
    elseif(isset($_POST["DOWN"])) {
        MoveDown($x, $y, $tableau);
    
    }
    // drawInitTable($tableau);
    drawTable($tableau);
    var_dump($tableau);
    } else {
        drawInitTable($tableau);

    }
// 


?>
</div>

<!-- formulaire de déplacement pour le labyrinthe -->
<div class ="text-center mt-5 mb-5">
    <form action="" method="post">
        <input type="radio" name="UP"> <label for="radio">MoveUP</label> <br>
        <input type="radio" name="LEFT"> <label for="radio">MoveLeft</label>
        <input type="radio" name="RIGHT"> <label for="radio">MoveDown</label>
        <input type="radio" name="DOWN"> <label for="radio">MoveRight</label> <br>
        <button type="submit" class="btn btn-primary mt-4">Confirm</button>
    </form>
</div>
<!--  -->

 <!-- A faire -->
<button type="button" class="btn btn-primary mt-5">Restart game</button>
<!--  -->
<?php 




?>
</html> 

<html>   
</body> 
<html>