<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Clicker</title>
    <link rel="icon" href="../images/logo_zoinks.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/koek.css">
</head>

<body>
    <?php

    include_once 'functie.php';
    age_identify();
    header1();
    nav();
    ?>
    <main>
        <section>
            <?php

            // Controleert of de sessie-variabele bestaat, zo niet, start een nieuw spel
            if (!isset($_SESSION['cookies'])) {
                $_SESSION['cookies'] = 0;
            }

            // Functie om op de cookie te klikken
            if (isset($_POST['clickCookie'])) {
                $_SESSION['cookies']++;
            }

            // Functie om de koeken te resetten
            if (isset($_POST['resetCookies'])) {
                $_SESSION['cookies'] = 0;
            }
            ?>
            <h1>Cookie Clicker</h1>

            <form method="post">
                <button type="submit" name="clickCookie" id="click-button"></button>
                <p id="cookies-count">Aantal koeken: <?php echo $_SESSION['cookies']; ?></p>

            </form>

            <form method="post">
                <button type="submit" name="resetCookies" id="reset-button">Reset Koeken</button>
            </form>
        </section>
        <?php

        aside();
        ?>
    </main>
    <?php

    footer();
    ?>
</body>

</html>