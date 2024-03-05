<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeomn quiz</title>
    <link rel="icon" href="../images/logo_zoinks.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pokemon.css">
</head>
<?php

include_once 'functie.php';
age_identify();
header1();
nav();
?>

<body>
    <main>
        <section>
            <h1>Pokemon Quiz</h1>
            <?php
            // Hier worden de vragen bewaard 
            $vragen = array(
                "Whats the first Pokémon that was created by GameFreak?",
                "What Pokémon learns the move Doom Desire?",
                "What move places a layer of spikes and on the field and damages the opponent when used?",
                "What fully evolved pokemon gets the ability Ice Scales?",
                "What Pokémon has the highest base speed?",
                "What Pokéball has a low catch rate on every normal Pokémon?",
                "What Pokémon has the most evolutions?",
                "What Pokémon was released before its generation came out?",
                "What Fairy Type Pokemon is also in Super Smash Bros?",
                "What Shiny Pokémon do you get for beating the hardest level of Ogre Ousting?"
            );
            // Hier worden de antwoorden bewaard
            $Antw = array(
                "Rhydon",   
                "Jirachi",
                "Ceaseless Edge",
                "Frosmoth",
                "Regieleki",
                "Beast Ball",
                "Eevee",
                "Togepi",
                "Jigglypuff",
                "Munchlax"
            );

        echo "<div class='form_div'>";
        echo '<form id="form_pokemon" method="post" action="Pokemon.php">';
            //Met deze code worden de vragen een voor een geprint
            for ($i = 0; $i < count($vragen); $i++) {
                echo '<p>' . $vragen[$i] . ' <input type="text" name="answer' . $i . '" required></p>';
            }
            //hierin worden je antwoorden gestuurd
            echo '<input type="submit" value="Submit anwnsers">';
            echo '</form>';

            //ontvangt de antwoorden die je in de form verstuurt
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $score = 0;
                //gaat langs iedere antwoord
                for ($i = 0; $i < count($Antw); $i++) {
                    $userAnswer = isset($_POST["answer$i"]) ? $_POST["answer$i"] : '';
                    //checkt of je antwoord gelijk is aan het correcte antwoord
                    if (strtolower($userAnswer) == strtolower($Antw[$i])) {
                        $score++;
                    }
                }
                //echo't je eindscore
                echo '<p>Your score: ' . $score . '/' . count($Antw) . '</p>';
                $_SESSION['score_Pokemon'] = $score;
            }
            echo "</div>";
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