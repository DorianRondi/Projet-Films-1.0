<?php require_once('require'.DIRECTORY_SEPARATOR.'functions.php') ?>
<?php
$updatedFilm = NULL;
$doomedFilm = NULL;
$query = NULL;

if($_POST["supprimeFilm"]){
    supprime($_POST["supprimeFilm"]);
    header("Location:.");exit();
}
if($_POST["update"]){

    if($_FILES){
        $tmp_name = $_FILES["afficheUser"]["tmp_name"];
        $destination = $DS."home".$DS."dorian".$DS."Programmation".$DS."DonkeySchool".$DS."PHP".$DS."Projet Films 1.0".$DS."img".$DS."affiches".$DS.$_FILES["afficheUser"]["name"];
        $affiche = ".".$DS."img".$DS."affiches".$DS.$_FILES["afficheUser"]["name"];

        if(!move_uploaded_file($tmp_name,$destination)){
            echo "echec".$BR."Error ";
            echo $_FILES["afficheUser"]["error"];
        }else{
            echo "reussis";
        }

        update($_POST,$affiche);
    }else{
        update($_POST);
    }
}else{
    if($_FILES){
        $tmp_name = $_FILES["afficheUser"]["tmp_name"];
        $destination = $DS."home".$DS."dorian".$DS."Programmation".$DS."DonkeySchool".$DS."PHP".$DS."Projet Films 1.0".$DS."img".$DS."affiches".$DS.$_FILES["afficheUser"]["name"];
        $affiche = ".".$DS."img".$DS."affiches".$DS.$_FILES["afficheUser"]["name"];

        if(!move_uploaded_file($tmp_name,$destination)){
            echo "echec".$BR."Error ";
            echo $_FILES["afficheUser"]["error"];
        }else{
            echo "reussis";
        }

        create($_POST,$affiche);
    }else{
        create($_POST);
    }
}
header("Location:.");exit();
?>
<pre>
    <?= "-----------------".$BR; ?>
    <?= '$_SERVER'; ?>
    <?php var_dump($_SERVER);?>
    <?= "-----------------".$BR; ?>
    <?= '$_POST'; ?>
    <?php var_dump($_POST);?>
    <?= "-----------------".$BR; ?>
    <?= '$_FILES'; ?>
    <?php var_dump($_FILES);?>
    <?= "-----------------".$BR; ?>
    <?= '$tmp_name'; ?>
    <?php var_dump($tmp_name);?>
    <?= "-----------------".$BR; ?>
    <?= '$destination'; ?>
    <?php var_dump($destination);?>
    <?= "-----------------".$BR; ?>
    <?= '$affiche'; ?>
    <?php var_dump($affiche);?>
    <?= "-----------------".$BR; ?>
</pre>
<a href=".">index.php</a>