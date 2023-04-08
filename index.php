<?php $homePage = 'active'; ?>
<?php require_once('require'.DIRECTORY_SEPARATOR.'functions.php') ?>
<?php require('require'.$DS.'header.php') ?>
<?php $videotheque = videothequeList(); ?>

<!--
<?php
$x1 = strtotime('1999-06-16');
$y1 = date('d.m.Y H:i:s', $x1);
echo $x1.$BR;
echo $y1.$BR;
// But
$x2 = strtotime('1999-06-16');
$y2 = date('d.m.Y H:i:s', $x2);
echo $x2.$BR;
echo $y2.$BR;
?>
-->

        <!-- Section-->
        <section>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    
                    <!-- Debut ADD CARD -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="card-body pb-4 pt-0 bg-transparent d-flex flex-column justify-content-center">
                                <a href="form.php" Title="Ajouté">
                                    <img src="./img/icons/plus.png" alt="" class="card-img">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- fin ADD CARD -->

                    <!-- Debut FILM CARD -->
                    <?php FOREACH ($videotheque as $film): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Affiche -->
                            <img class="card-img-top" src="<?= $film['affiche'] ?>" alt="..."/>
                            <!-- Détails -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Titre -->
                                    <h5 class="fw-bolder"><?= $film['titre_film'] ?></h5>
                                    <!-- Sortis -->
                                    <?= $film['date_sortis'] ?></br>
                                    <!-- Genre -->
                                    <?= $film['genre'] ?></br>
                                    <!-- Durée -->
                                    <?= $film['duree'] ?>
                                    <!-- Note -->
                                    <!--
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                            <!-- Actions -->
                            <div class="card-footer pb-4 pt-0 border-top-0 bg-transparent d-flex justify-content-between">
                                <form action="form.php" method="GET">
                                    <input type="hidden" name="editeFilm" value="<?= $film['id'] ?>">
                                    <input type="submit" value="Editer" class="btn btn-outline-dark mt-auto">
                                </form>
                                <form action="redirect.php" method="POST">
                                    <input type="hidden" name="supprimeFilm" value="<?= $film['id'] ?>">
                                    <input type="submit" value="Supprimer" class="btn btn-outline-dark mt-auto">
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php ENDFOREACH ?>
                    <!-- fin FILM CARD -->
                </div>
            </div>
        </section>

<?php require('require'.$DS.'footer.php') ?>