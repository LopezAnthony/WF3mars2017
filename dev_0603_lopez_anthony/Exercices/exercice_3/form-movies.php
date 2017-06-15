<?php

	require_once 'inc/connect.php'; // Récupération de $pdo (Instance de PDO)
	require_once 'inc/functions.php';

	// Récupération de tous les films
	$movies = getAllMovies($pdo);

	$moviesByViews = getAllMoviesByView($pdo);

	if(!empty($_POST)){
	    $id = $_POST['add-view'];
        $update = $pdo->prepare('UPDATE movies SET nb_viewers = nb_viewers + 1 WHERE id = :id');
        $update->bindParam(':id', $_POST['add-view']);
        $update->execute();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ciné Phil</title>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<section id="list-movies">
		<ul>
		<?php foreach($movies as $movie) : ?>
			<li>
				<form action="" method="POST">
					<button type="submit" name="add-view" value="<?= $movie['id'] ?>">Ajouter une vue</button>
					<?= $movie['title'] ?> (<i><?= $movie['genre_name'] ?></i>)
				</form>
			</li>
		<?php endforeach ?>
		</ul>
	</section>
	<section id="table-movies">
		
		<!-- Tableau de statistiques -->
        <table>
            <tr>
                <th>Title</th>
                <th>Release date</th>
                <th>Views</th>
                <tr></tr>
            </tr>
            <?php
                foreach($moviesByViews as $value){
                    echo '<tr>';
                        echo '<td>'. $value['title'] .'</td>';
                        echo '<td>'. $value['release_date'] .'</td>';
                        echo '<td>'. $value['nb_viewers'] .'</td>';
                    echo '</tr>';
                }
            ?>
        </table>

	</section>
</body>
</html>