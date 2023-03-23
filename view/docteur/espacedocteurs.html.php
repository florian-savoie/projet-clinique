<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    <style>
        header {

            border-radius: 2rem;

            height: 40vh;
            background-image: url(assets/img/building.jpg);
            background-size: cover;
            background-position: center;
        }



        p {
            font-family: "source_sans_proregular";
            font-size: 16px;
        }

        .cardTeam {
            display: flex;
            justify-content: center;
        }

        .contenuText {
            background-color: rgba(243, 237, 237, 0.7);
            padding: 3rem;
        }

        table {
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            padding: 1rem;
            /* Ajoute un padding de 1 rem à tout le tableau */
            width: 50%;
        }

        td,
        tr {
            height: 60px;
            width: 60px;
            text-align: center;
            padding: 20px;

        }

        .headtableau {
            text-align: center;
            color: red;
            font-size: 2rem;
            padding: 2rem;
        }

        .containertable {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<header class="">
    <?php
    require('leyout/nav.html.php');
    ?>
</header>

<body>

    <div class="container">
        <h1><?php if (isset($message)) echo $message; ?></h1>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="?planing=show">planing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?synthesepatient=show">synthèse patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?Payemment=show">Payemment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="?rendezvous=show">Les rendez-vous</a>
            </li>
        </ul>
        <form class="form-inline" method="POST">
            <div class="form-group">
                <label for="year">Sélectionnez une année :</label>
                <select class="form-control" id="year" name="year">
                    <?php for ($i = 2020; $i <= 2030; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>


                <label for="month">Sélectionnez un mois :</label>
                <select class="form-control" id="month" name="month">
                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo date("F", mktime(0, 0, 0, $i, 1, 2021)); ?></option>
                    <?php } ?>
                </select>

                <button type="submit" class="btn btn-primary" value="recherchedate" name="recherchedate">Rechercher</button>
            </div>
        </form>
        <?php
        $current_month = date("n");
        $current_year = date("Y");
        function generate_calendar($year, $month)
        {
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $first_day = date("N", mktime(0, 0, 0, $month, 1, $year));

            echo "    <div class='container containertable'>
    <table '>";
            echo "<tr><th class='headtableau' colspan='7'>Années : " . $year . " Mois : " . $month . "</th></tr>";
            echo "<tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr>";

            echo "<tr>";
            $day_count = 1;
            for ($i = 1; $i < $first_day; $i++) {
                echo "<td></td>";
            }
            for ($i = $first_day; $i <= 7; $i++) {
                echo "<td>$day_count</td>";
                $day_count++;
            }
            echo "</tr>";

            for ($week = 2; $week <= 6; $week++) {
                echo "<tr>";
                for ($day = 1; $day <= 7; $day++) {
                    if ($day_count > $days_in_month) {
                        break;
                    }
                    echo "<td>$day_count</td>";
                    $day_count++;
                }
                echo "</tr>";
                if ($day_count > $days_in_month) {
                    break;
                }
            }
            echo "</table></div>";
        }
        if (isset($_POST['year']) && isset($_POST['month'])) {
            generate_calendar($_POST['year'], $_POST['month']);
        } else {
            generate_calendar($current_year, $current_month);
        }
        // Exemple d'utilisation : affiche le calendrier pour mars 2023
        ?>
    </div>

</body>

</html>