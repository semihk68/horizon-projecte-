<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlog Pagina</title>
    <link rel="icon" href="images/logo_zoinks.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inlogstyle.css">
</head>

<body>
    <?php
    include_once 'games/functie.php';
    ?>
    <header>
        <img src='images/logo_zoinks.jpeg' alt='logo' class='logo'>
        <div class='inf_header'>
            <h1>Welkom bij Zoinks Casino!</h1>
            <p>
                Hier vind je de games: Cookie Clikker, Galgje, Een Pokemon Quiz, Slots en Steen Papier Schaar.
                Deze games zijn allemaal te spelen zonder inzet. Wij doen niet afpersing!
            </p>
        </div>
    </header>
    <nav>
        <a href='Games/home.php'><img src='images/icon_nav/icon_home.png' class='icon_nav'> home</a>
        <a href='Games/Galgje.php'><img src='images/icon_nav/icon_galg.png' class='icon_nav'> galgje</a>
        <a href='Games/Pokemon.php'><img src='images/icon_nav/icon_pokemon.png' class='icon_nav'> pokemon</a>
        <a href='Games/slot.php'><img src='images/icon_nav/icon_slots.png' class='icon_nav'> slots</a>
        <a href='Games/steenpapierschaar.php'><img src='images/icon_nav/icon_steen_papier_schaar.png' class='icon_nav'> steen papier schaar</a>
        <a href='Games/cookie.php'><img src='images/icon_nav/icon_cookie.png' class='icon_nav'> cookie cliker</a>
    </nav>
    <main>
        <section>
            <div class="container">
                <div class="form-container">
                    <form method="post"> <!--form = Formulier -->
                        <h2>Inloggen</h2> <!--Dit is de titel van het formulier. -->
                        <div class="input-field">
                            <input type="text" class="input" placeholder="Naam">
                            <!--Dit is het invulveld voor je naam.-->
                        </div>
                        <div class="input-field">
                            <input type="text" name="age" id="age" placeholder="Leeftijd" required>
                            <!--Dit is het invulveld voor je leeftijd-->
                        </div>
                        <button type="input" class="button">Controlleren</button>
                        <!--Dit is de controleer button waarin de functie uitgevoerd wordt die gemaakt is.-->
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['age'])) {
                if ($_POST['age'] < 16) {
                    if (!isset($_SESSION['age'])) { 
                        $_SESSION['age'] = $_POST['age'];
                    }
                } elseif ($_POST['age'] >= 16) {
                    header("Refresh:0; url=games/home.php");
                    if (!isset($_SESSION['age'])) { 
                        $_SESSION['age'] = $_POST['age'];
                    }
                }
            }
            ?>
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
