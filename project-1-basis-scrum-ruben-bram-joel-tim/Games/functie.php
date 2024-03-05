<?php

session_start();
function header1()
{
    echo "<header>
 <img src='../images/logo_zoinks.jpeg' alt='logo' class='logo'>
 <div class='inf_header'>
 <h1>Welkom bij Zoinks Casino!</h1>
 <p>
     Hier vind je de games: Cookie Clikker, Galgje, Een Pokemon Quiz, Slots en Steen Papier Schaar.
     Deze games zijn allemaal te spelen zonder inzet. Wij doen niet afpersing!
 </p>
 </div>
 </header>";
}

function nav()
{
    echo "
    <nav>
<a href='home.php'><img src='../images/icon_nav/icon_home.png' class='icon_nav'> home</a>
<a href='Galgje.php'><img src='../images/icon_nav/icon_galg.png' class='icon_nav'> galgje</a>
<a href='Pokemon.php'><img src='../images/icon_nav/icon_pokemon.png' class='icon_nav'> pokemon</a>
<a href='slot.php'><img src='../images/icon_nav/icon_slots.png' class='icon_nav'> slots</a>
<a href='steenpapierschaar.php'><img src='../images/icon_nav/icon_steen_papier_schaar.png' class='icon_nav'> steen papier schaar</a>
<a href='cookie.php'><img src='../images/icon_nav/icon_cookie.png' class='icon_nav'> cookie cliker</a>
</nav>    
";
}

function aside()
{
    if (!isset($_SESSION['score_rockpaperscissors'])) {
        $_SESSION['score_rockpaperscissors'] = 0;
    }
    if (!isset($_SESSION['score_Galgje'])) {
        $_SESSION['score_Galgje'] = 0;
    }
    if (!isset($_SESSION['score_Slots'])) {
        $_SESSION['score_Slots'] = 0;
    }
    if (!isset($_SESSION['score_Pokemon'])) {
        $_SESSION['score_Pokemon'] = 0;
    }
    if (!isset($_SESSION['cookies'])) {
        $_SESSION['cookies'] = 0;
    }

    echo "<aside>";
    echo "<table>";
    echo "<tr><th>Game</th><th>wins</th></tr>";
    echo "<td>Galgje</td>";
    echo "<td>" . $_SESSION['score_Galgje'] . "</td>";
    echo "</tr>";
    echo "<td>Pokemon</td>";
    echo "<td>" . $_SESSION['score_Pokemon'] . "/10" . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<tr>";
    echo "<td>Slots</td>";
    echo "<td>" . $_SESSION['score_Slots'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Steen papier schaar</td>";
    echo "<td>" . $_SESSION['score_rockpaperscissors'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>cookie klicker</td>";
    echo "<td>" . $_SESSION['cookies'] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</aside>";
}

function footer()
{
    echo "
    <footer>
    <p>Copyright &copy; 2024 Zoinks Casino</p>
    <p>Gemaakt door Ruben, Bram, Tim, Joel en Semih</p>
    </footer>
    ";
}

function age_identify()
{
    if (isset($_SESSION['age'])) {
        if ($_SESSION['age'] < 16) {
            header("Refresh:0; url=../index.php");
        } 
    } elseif (!isset($_SESSION['age'])) {
        header("Refresh:0; url=../index.php");
    } 
}

function unset1()
{
    unset($_SESSION["try"]);
    unset($_SESSION["woord"]);
    unset($_SESSION["responses"]);
    unset($_SESSION["gebruikteletters"]);
    unset($_SESSION["tijdelijke_score"]);
}
