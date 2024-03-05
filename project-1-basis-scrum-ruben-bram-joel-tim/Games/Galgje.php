<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoinks Casino -- Galgje</title>
    <link rel="icon" href="../images/logo_zoinks.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/galgje.css">
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
            // hier wordt gekeken of er een plek is waar de score word opgeslagen en anders word deze aangemaakt met standaard waarde 0
            if (isset($_SESSION['score_Galgje'])) {
                $score_Galgje = $_SESSION['score_Galgje'];
            } else {
                $_SESSION['score_Galgje'] = 0;
                $score_Galgje = $_SESSION['score_Galgje'];
            }

            // hier word een random woord gekozen
            $randomwoord = [
                "apple", "banana", "orange", "elephant", "giraffe", "computer", "keyboard",
                "programming", "python", "language", "chocolate", "elephant", "sunshine", "moonlight", "umbrella",
                "watermelon", "happiness", "laughter", "mountain", "ocean", "adventure", "beautiful", "courage", "delicious",
                "fantastic", "inspiration", "jubilation", "kindness", "lighthouse", "magnificent", "notebook", "optimistic",
                "peaceful", "quizzical", "radiant", "spectacular", "tranquil", "universe", "vibrant", "xylophone",
                "yesterday", "zeppelin"
            ];
            if (!isset($_SESSION['woord'])) {
                $_SESSION['woord'] = $randomwoord[rand(0, count($randomwoord) - 1)];
            }
            $woord = "";
            // hier word de lengte van het woord gecontroleerd
            if (isset($_SESSION['woord'])) {
                $woord = strtolower($_SESSION['woord']); // strtolower = zet alles in kleine letters
            } else {
                echo "Woord is niet ingesteld.";
            }
            $maxletters = strlen($woord); // strlen = lengte
            $letters = "abcdefghijklmnopqrstuvwxyz";

            // hier word er gekeken of er een try(hoeveelkeer hij fout is) is
            if (isset($_SESSION['try'])) {
                $try = $_SESSION['try'];
            } else {
                $_SESSION['try'] = 1;
                $try = 1;
            }

            // try == 11 = verloren
            if ($try == 11) {
                echo "<h1>Je hebt verloren!</h1>";
                echo "<h2>Het woord was: " . $_SESSION['woord'] . "</h2>";
                echo "<form method='post'>
                <button name='reset'>restart</button>
                </form>";
                $score_Galgje--;
                $_SESSION['score_Galgje'] = $score_Galgje;
                echo "<style>#letterbalk { display: none; }</style>";
                unset1();
                // try < 11 = gewonnen                // in_array = kijkt of de waarde in de array zit
            } elseif (isset($_SESSION['responses']) && !in_array("&nbsp;", $_SESSION['responses'])) {
                echo "<h1>Je hebt gewonnen!</h1>";
                echo "<form method='post'>
                <button name='reset'>restart</button>
                </form>";
                $score_Galgje++;
                $_SESSION['score_Galgje'] = $score_Galgje;
                echo "<style>#letterbalk { display: none; }</style>";
                unset1();
            }

            // Restart button
            if (isset($_POST['reset'])) {
                header("Location: Galgje.php");
                $_SESSION['woord'] = $randomwoord[rand(0, count($randomwoord) - 1)];
            }

            // Goed geraden letters
            if (!isset($_SESSION['responses'])) {
                $_SESSION['responses'] = array_fill(0, $maxletters, "&nbsp;");
            }

            // Checkt of er een letter is ingevoerd
            if (isset($_GET['lp'])) {
                header("Refresh:0; url=Galgje.php", true, 303);
                $gebruikteletter = strtolower($_GET['lp']); // strtolower = zet alles in kleine letters
                if (!isset($_SESSION['gebruikteletters'])) {
                    $_SESSION['gebruikteletters'] = [];
                }

                if (in_array($gebruikteletter, $_SESSION['gebruikteletters'])) {
                    echo "De letter " . $gebruikteletter . " is al gebruikt.";
                } else {
                    $_SESSION['gebruikteletters'][] = $gebruikteletter;
                    $found = false;

                    for ($i = 0; $i < $maxletters; $i++) {
                        if ($woord[$i] == $gebruikteletter) {
                            $_SESSION['responses'][$i] = $gebruikteletter;
                            $found = true;
                        }
                    }

                    if (!$found) {
                        $try++;
                        $_SESSION['try'] = $try;
                    }
                }
            }
            ?>
            <h1>Hangman the game</h1>
            <div class="game-picture">
                <?php
                // Fotos van Galgje
                $image = [
                    "<img src='../images/Galgje/galgje0.png' alt='hangman'>", "<img src='../images/Galgje/galgje1.png' alt='hangman'>", "<img src='../images/Galgje/galgje2.png' alt='hangman'>",
                    "<img src='../images/Galgje/galgje3.png' alt='hangman'>", "<img src='../images/Galgje/galgje4.png' alt='hangman'>", "<img src='../images/Galgje/galgje5.png' alt='hangman'>",
                    "<img src='../images/Galgje/galgje6.png' alt='hangman'>", "<img src='../images/Galgje/galgje7.png' alt='hangman'>", "<img src='../images/Galgje/galgje8.png' alt='hangman'>",
                    "<img src='../images/Galgje/galgje9.png' alt='hangman'>", "<img src='../images/Galgje/galgje10.png' alt='hangman'>", "<img src='../images/Galgje/galgje11.png' alt='hangman'>",
                ];

                echo $image[$try];
                ?>
            </div>
            <div class="game-info">
                <form method="get">
                    <?php
                    $max = strlen($letters) - 1; // strlen = lengte van string

                    // Zet gebruikte letters in array
                    if (!isset($_SESSION['gebruikteletters']) || !is_array($_SESSION['gebruikteletters'])) {
                        $_SESSION['gebruikteletters'] = array();
                    }
                    // Maakt voor elke letter buttons aan
                    for ($i = 0; $i <= $max; $i++) {
                        if (in_array($letters[$i], $_SESSION['gebruikteletters'])) {
                            echo "<button disabled class='gebruikt' type='submit' name='lp' value='" . $letters[$i] . "'>" . $letters[$i] . "</button>";
                        } else {
                            echo "<button  class='speelbutton' type='submit' name='lp' value='" . $letters[$i] . "'>" . $letters[$i] . "</button>";
                        }
                    }

                    ?>
                </form>
            </div>
            <?php
            // Gekozen letters
            if (!isset($_SESSION['responses']) || !is_array($_SESSION['responses'])) {
                $_SESSION['responses'] = array_fill(0, $maxletters, "&nbsp;");
            }                           // array_fill = vul een array met een specifieke waarde
            foreach ($_SESSION['responses'] as $response) {
                echo "<span class='gekozen_letters'>" . $response . "</span>";
            }

            // Gebruikte letters
            echo "<p>Gebruikte letters: ";
            if (isset($_SESSION['gebruikteletters'])) {
                foreach ($_SESSION['gebruikteletters'] as $gebruikteletter) {
                    echo $gebruikteletter . " ";
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
