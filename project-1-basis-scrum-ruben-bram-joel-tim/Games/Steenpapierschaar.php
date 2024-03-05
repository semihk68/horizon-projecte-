<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoinks Casino</title>
    <link rel="icon" href="../images/logo_zoinks.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/steenpapierschaar.css">
</head>

<body>
    <?php
    //wijst naar functie.php en voegt de header en nav in
    include_once 'functie.php';
    age_identify();
    header1();
    nav();
    ?>
    <!-- hoofd deel van de pagina -->
    <main>
        <!-- het gedeelte waar de game word gespeeld -->
        <section>

            <div class="info_steenpapierschaar">
                <h2>Maak Uw Keuze</h2>
            </div>
            <!-- formulier waar de speler met behulp van plaatjes kiest wat hij wilt spelen -->
            <form method="post" id="rock_paper_scissors_form">
                <button class="button_rock" type="submit" name="start" value="rock"><img src="../images/steen_papier_schaar/steen.png" class="img_rockpaperscissors" /></button>
                <button class="button_rock" type="submit" name="start" value="paper"><img src="../images/steen_papier_schaar/papier.png" class="img_rockpaperscissors" /></button>
                <button class="button_rock" type="submit" name="start" value="scissors"><img src="../images/steen_papier_schaar/schaar.png" class="img_rockpaperscissors" /></button>
            </form>

            <?php
            // hier wordt gekeken of er een plek is waar de score word opgeslagen en anders word deze aangemaakt met standaard waarde 0
            if (isset($_SESSION['score_rockpaperscissors'])) {
                $score_rockpaperscissors = $_SESSION['score_rockpaperscissors'];
            } else {
                $_SESSION['score_rockpaperscissors'] = 0;
                $score_rockpaperscissors = $_SESSION['score_rockpaperscissors'];
            }

            //haalt de keuze van de gebruiker op en zet deze vast op een veilige plek
            if (isset($_POST["start"])) {
                $_SESSION['player_choice'] = $_POST["start"];
            }

            //kijkt waneer de gebruiker een keuze maakt en voert dan pas de code tot line 92 uit
            if (isset($_SESSION["player_choice"])) {
                //maakt een div aan zodat er een achtergrond kleur gekozen kan wordne
                echo "<div class='win_info'>";
                // geeft style aan het keuze formulier zodat deze niet meer zicht baar is 
                echo "<style>#rock_paper_scissors_form { display: none; }</style>";
                //zet de spelers zijn keuze in een variable voor later
                $selectedOption_1 = $_SESSION['player_choice'];
                //laat de keuze speler van zien  
                echo "<p class='choices'>jouw keuze $selectedOption_1 </p>";

                //maakt de keuze van computer aan en laat deze ook zien
                $computer = mt_rand(1, 3);
                if ($computer == 1) {
                    $computer_choice = "rock";
                    echo "<p class='choices'>Computers keuze steen</p>";
                } elseif ($computer == 2) {
                    $computer_choice = "paper";
                    echo "<p class='choices'>Computers keuze papier</p>";
                } elseif ($computer == 3) {
                    $computer_choice = "scissors";
                    echo "<p class='choices'>Computers keuze schaar</p>";
                }

                //kijkt wie er gewonnen heeft laat dit zien en zorgt er voor dat de keuze van de speler word weg gehaald voor de volgende ronden
                // en stuurt je na 2,5 seconde terug naar het begin van de game
                if ($selectedOption_1 == $computer_choice) {
                    echo "<h1 class='result'>gelijkspel</h1>";
                    unset($_SESSION["player_choice"]);
                    header("Refresh:2.5; url=Steenpapierschaar.php", true, 303);
                    $score_rockpaperscissors++;
                } else if ($selectedOption_1 == "rock" && $computer_choice == "scissors") {
                    echo "<h1 class='result'>jij wint</h1>";
                    unset($_SESSION["player_choice"]);
                    header("Refresh:2.5; url=Steenpapierschaar.php", true, 303);
                    $score_rockpaperscissors++;
                } else if ($selectedOption_1 == "paper" && $computer_choice == "rock") {
                    echo "<h1 class='result'>jij wint</h1>";
                    unset($_SESSION["player_choice"]);
                    header("Refresh:2.5; url=Steenpapierschaar.php", true, 303);
                    $score_rockpaperscissors++;
                } else if ($selectedOption_1 == "scissors" && $computer_choice == "paper") {
                    echo "<h1 class='result'>jij wint</h1>";
                    unset($_SESSION["player_choice"]);
                    header("Refresh:2.5; url=Steenpapierschaar.php", true, 303);
                    $score_rockpaperscissors++;
                } else {
                    echo "<h1 class='result'>computer wint</h1>";
                    unset($_SESSION["player_choice"]);
                    header("Refresh:2.5; url=Steenpapierschaar.php", true, 303);
                    $score_rockpaperscissors--;
                }
                //eindigt de achtergrond kleur
                echo "</div>";
                //zet de score veilig aan de kant
                $_SESSION['score_rockpaperscissors'] = $score_rockpaperscissors;
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