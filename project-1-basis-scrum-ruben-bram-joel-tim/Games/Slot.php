<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zoinks casion</title>
    <link rel="icon" href="../images/logo_zoinks.jpeg" type="image/x-icon">\
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../CSS/slot.css">
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
            //hier worden de foto's opgeslagen in een variable en in een functie zodat ik ze later op kan roepen.
            function randomphotos()
            {
                $thephotos = ['../images/slot-machine/cherry neon.png', '../images/slot-machine/diamond neon.png', '../images/slot-machine/klavertje vier neon.png', '../images/slot-machine/watermeloen neon.png', '../images/slot-machine/zeven neon.png', '../images/slot-machine/BAR neon .png'];
                $randomIndex = array_rand($thephotos);
                return $thephotos[$randomIndex];
            }

            //hier pakt hij 1 van de random foto's en displayed hij het. (en het zit in een class zodat je het kan aanspreken)
            function displayphoto()
            {
                $photo = randomphotos();
                echo '<div class="slot-symbol"><img class="img_slots" src="' . $photo . '" alt="Slot Symbol"></div>';
            }

            //dit zorgt ervoor dat als het dezelfde symbolen zijn het dan terug stuurt om het zo te zeggen
            function samesymbols($symbols)
            {
                return $symbols[0] === $symbols[1] && $symbols[1] === $symbols[2];
            }
            //dit zorgt ervoor dat als er 2 dezelfde symbolen zijn dat het dan terug gestuurd wordt van er zijn 2 symbolen
            function hasTwoIdenticalSymbols($symbols)
            {
                return count(array_unique($symbols)) === 2;
            }

            //dit is om de foto's te displayen
            $slotSymbols = [
                randomphotos(),
                randomphotos(),
                randomphotos()
            ];

            //dit is om ervoor te zorgen dat de foto's meteen gedisplayed worden ipv dat je eerst moet refreshen om een 'sessie' aan te maken
            if (isset($_POST['spin'])) {
                $slotSymbols = [
                    randomphotos(),
                    randomphotos(),
                    randomphotos()
                ];
            }

            //dit is om elke willekeurige foto aan te spreken om de css ervan te veranderen met behulp van classes
            echo '<div class="slot-container">';
            echo '<div class="slot-one">';
            echo '<div class="slot-symbol"><img src="' . $slotSymbols[0] . '" alt="Slot Symbol" id="slot_img"></div>';
            echo '</div>';
            echo '<div class="slot-two">';
            echo '<div class="slot-symbol"><img src="' . $slotSymbols[1] . '" alt="Slot Symbol" id="slot_img"></div>';
            echo '</div>';
            echo '<div class="slot-three">';
            echo '<div class="slot-symbol"><img src="' . $slotSymbols[2] . '" alt="Slot Symbol" id="slot_img"></div>';
            echo '</div>';
            echo '</div>';



            //dit is een array waar alle vallues van alles foto's worden opgeslagen
            $values = array(
                '../images/slot-machine/cherry neon.png' => 1,
                '../images/slot-machine/watermeloen neon.png' => 2,
                '../images/slot-machine/klavertje vier neon.png' => 2.5,
                '../images/slot-machine/BAR neon .png' => 5,
                '../images/slot-machine/diamond neon.png' => 10,
                '../images/slot-machine/zeven neon.png' => 100,
            );

            //dit maakt een sessie aan om de score bij te kunnen houden
            $score_Slots = isset($_SESSION['score_Slots']) ? $_SESSION['score_Slots'] : 0;

            //dit is om de score bij te houden de eerste 'if' is er zodat de score meteen kan laden net zoals bijd e afbeeldingen, de tweede 'if' zorgt ervoor dat als er 2 dezeflde foto's zijn hij het bedrag van die foto's keer 2 doet, 'elseif' zorgt ervoor dat als je 3 dezelfde foto's hebt dat hij dan de value van die foto keer 3 doet, 
            if (isset($_POST['spin'])) {
                if (hasTwoIdenticalSymbols($slotSymbols)) {
                    $symbol = $slotSymbols[0];
                    $score = $values[$symbol] * 2;
                    $score_Slots += $score;
                    echo '<p>Well done! You have two identical symbols! Score: ' . $score . '</p>';
                } elseif (samesymbols($slotSymbols)) {
                    $symbol = $slotSymbols[0];
                    $score = $values[$symbol] * 3;
                    $score_Slots += $score;

                    //de 'if' zorgt ervoor dat als alle 3 de plaatjes een zeven zijn hij dan jackpot zegt, de 'else' zorgt ervoor dat als je 3 dezelfde hebt hij zegt wat er in de echo staat en de andere 'else' als je niks hebt gewonnen
                    if ($symbol === '../images/slot-machine/zeven neon.png') {
                        echo '<p>JACKPOT! You got three "zeven neon" symbols!' . $score . '</p>';
                    } else {
                        echo '<p>Congratulations! You won! Score: ' . $score . '</p>';
                    }
                } else {
                    echo '<p> you lose, try again? </p>';
                }

                //dit is om de score bij te houden
                $_SESSION['score_Slots'] = $score_Slots;
            }
            ?>

            <form id="spinnerbutton" method="post">
                <button id="spinner" name="spin">Spin</button>
            </form>
            <?php

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