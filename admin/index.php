<?php include("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$animes = $mysqli->query("SELECT * FROM animes ORDER BY score DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style.css">
    <title>
        Admin
    </title>
</head>

<body>
    <main class="container">
        <h1>Admin</h1>
        <a href="/admin/create/">
            <button class="button">Tambah</button>
        </a>
        <a href="/admin/add-from-api?page=1&subtype=tv">
            <button class="button">Tambah dari API (tidak penting)</button>
        </a>
        <section class="section2">
            <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                <div class="card">
                        <img width="210" src="<?= $anime["image"] ?>" alt="gambar">
                    <div class="description">
                        <h3>
                            <a href="/admin/update-anime?id=<?= $anime["id"] ?>">
                                <?= $anime["title"] ?>
                            </a>
                        </h3>
                        <h4>Synopsis</h4>
                        <p><?= $anime["synopsis"] ?></p>
                        <h4>Episodes</h4>
                        <span><?= $anime["episodes"] ?></span>
                        <h4>Score </h4>
                        <span><?= $anime["score"] ?></span>
                        <h4>Season </h4>
                        <span><?= $anime["season"] ?></span>
                        <h4>Year </h4>
                        <span><?= $anime["year"] ?></span>
                        <h4>Studio </h4>
                        <span><?= $anime["studio"] ?></span>
                    </div>
                </div>

            <?php endwhile ?>
        </section>

        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>
    </main>
</body>

</html>