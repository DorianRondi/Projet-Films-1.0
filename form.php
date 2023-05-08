<?php $formPage = 'active'; ?>
<?php require_once('require'.DIRECTORY_SEPARATOR.'functions.php') ?>
<?php require('require'.$DS.'header.php') ?>
<?php
    $update = FALSE;
    $validation = "Enregistrer";
    if(isset($_GET['editeFilm'])){
        $update = TRUE;
        $validation = "Editer";
        $editeFilm = intval($_GET['editeFilm']);
        $movie = filmEditor($editeFilm);
        //var_dump ($_GET['editeFilm']);
        //var_dump ($editeFilm);
        //var_dump ($update);
        //var_dump ($movie);
    }
?>
        <!-- Section-->
        <section>
            <div class="container px-4 px-lg-5 mt-5">

                <!-- Debut FORM -->
                <form enctype="multipart/form-data" action="redirect.php" method="POST">
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-3 justify-content-center">

                        <div class="col mb-5">
                            <div class="card h-100">

                                <!-- Détails -->
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <div class="text-center">

                                        <label for="affiche">Uploader l'affiche du film.</label>
                                        </br>
                                        <input id="affiche" name="afficheUser" type="file" accept="imag/.jpg,image/.jpeg,image/.webp">
                                        </br>

                                        <!-- Titre -->
                                        <label for="titre">Titre du film</label>
                                        </br>
                                        <input id="titre" name="titre_film" type="text" placeholder="Full metal Jacket" value="<?= $movie['titre_film'] ?>" class="w-100">
                                        </br>

                                        <!-- Sortis -->
                                        <label for="date_sortis">Date de sortis.</label>
                                        </br>
                                        <input id="date_sortis" name="date_sortis" type="date" value="<?= $movie['date_sortis'] ?>" class="w-100">
                                        </br>

                                        <!-- Genre -->
                                        <label for="genre">Genre pour du film.</label>
                                        </br>
                                        <input id="genre" name="genre" type="text" placeholder="Drame" value="<?= $movie['genre'] ?>" class="w-100">
                                        </br>

                                        <!-- Durée -->
                                        <label for="duree">Durée du film.</label>
                                        </br>
                                        <input id="duree" name="duree" type="time" value="<?= $movie['duree'] ?>" class="w-100">
                                    </div>
                                </div>
                                <!-- Actions -->
                                <div class="card-footer pb-4 pt-0 border-top-0 bg-transparent">

                                    <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                                    <input type="hidden" name="update" value="<?= $update ?>">
                                    <input type="hidden" name="affiche" value="<?= $movie['affiche'] ?>">

                                    <input type="submit" class="btn btn-outline-dark mt-auto w-100" value="<?= $validation ?>">
                                </div>
                            </div>
                        </div>

                        <?php IF(isset($_GET['editeFilm'])): ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Affiche -->
                                <img class="card-img" src="<?= $movie['affiche'] ?>" alt="..."/>
                            </div>
                        </div>
                        <?php ENDIF ?>

                    </div>
                </form>
            </div>
        </section>

<?php require('require'.$DS.'footer.php') ?>