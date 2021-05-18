<?php
session_start();
?>

<html>
    <meta charset="utf-8">
    <script src="app.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Labyrinth by JM </title>
    <p class="welcome text-center p-4"> 
         
        <?php if(!empty($_COOKIE['pseudo'])){
            echo("Welcome ".$_COOKIE['pseudo']." !");
            } else {
                echo"Welcome in the Labyrinth !";
            }
        ?>
        
    </p>
    <body class="bg-light">
        <!-- Rappel du pseudo si déjà existant ou formulaire de demande de pseudo -->
        <?php if(isset($_COOKIE['pseudo'])){ ?>
            <div class="d-flex flex-row justify-content-center align-items-center w-50 mx-auto mt-5">
                <h1 class="text-center mx-auto">Your Pseudo : "<?php echo($_COOKIE['pseudo']) ?>"</h1>
                <button class="button_form mt-0 w-25"> Click here to change </button>
            </div>
             <?php } else { 
                FormPseudo(); 
                }
                  
            
        // Bouton Play si le pseudo existe 
        if(isset($_COOKIE['pseudo'])) {?>
        <center><button type="button" id="button_play" class="btn btn-success btn-lg p-5 mt-5 w-25 h-25"onclick="window.location.href='game.php'">Play</button></center>   
        <?php } ?>
        <div class="text-center">
        </html>
        <?php 


//si le cookie n'est pas défini
if(!isset($_COOKIE['pseudo']))
{
    //on vérifie que le formulaire a bien été rempli
    if(!empty($_POST['pseudo']))
    {
        setcookie('pseudo', $_POST["pseudo"], time() + 365*24*3600);
        $pseudo = $_POST['pseudo'];
        $_SESSION["pseudo"] = $_POST['pseudo'];
    }
}
//supression cookie existant
// if(!empty($_POST['pseudo'])) {
//     setcookie('pseudo', $_POST['pseudo'], time() + 10);
// }

function FormPseudo(){
    ?> <html>
        <form action="" method="POST" class="text-center w-25 mx-auto">
        <input class="form-control" type="text" name="pseudo" placeholder="Enter your pseudo">
        <button class="button_form mt-3" type="submit" name="submit_pseudo" onclick="alert('Please refresh the Page')">Confirm your pseudo</button>
        <button type="button" class="button_form" onclick="window.location.reload()"> Refresh the Page</button>
        </form>
        
   </html>
   <?php
}

?>