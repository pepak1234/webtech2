<!-- Ball & Beam [Petra] -->

<?php
require "config.php";
$key = isset($_POST['apiKey'])? $_POST['apiKey'] : "";

$valid = ($key === $apiKey);
?>

<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gulička na tyči</title>

        <!-- css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- js -->
        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

        <script src="js_scripts/general.js"></script>
        <script src="js_scripts/ballbeam_script.js"></script>
    </head>

    <body>
        <header class="navbar-light bg-light">
            <h1>GULIČKA NA TYČI</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link">DOMOV</a></li>
                    <li class="nav-item"><a href="command.php" class="nav-link">SPUSTIŤ PRÍKAZ</a></li>
                    <li class="active nav-item"><a href="ballbeam.php" class="nav-link">GULIČKA</a></li>
                    <li class="nav-item"><a href="plane.php" class="nav-link">LIETADLO</a></li>
                    <li class="nav-item"><a href="pendulum.php" class="nav-link">KYVADLO</a></li>
                    <li class="nav-item"><a href="damping.php" class="nav-link">AUTO</a></li>
                    <li class="nav-item"><a href="statistika.php" class="nav-link">ŠTATISTIKA</a></li>
                    <li class="nav-item"><a href="documentation.php" class="nav-link">DOKUMENTÁCIA</a></li>
                    <li class="nav-item"><a href="ballbeam_english.php" class="nav-link">EN</a></li>
                </ul>
            </nav>
        </header>

        <!-- api kluc -->
        <div class="d-flex justify-content-center align-content-center flex-wrap flex-column">

            <div class="d-flex justify-content-center my-5 align-content-center flex-wrap form-inline">

                <form class="form-group" action="ballbeam.php" method="POST">
                    <label for="position" class="control-label"><b>API kľúč: </b> </label>
                    <input class="form-control" type="text" name="apiKey" id="apiKey" value="<?=$key?>">
                   <input type="submit" class="btn btn-primary" name="apiKeySubmit" id="apiKeySubmit" value="OK">
                </form>

            </div>

            <!-- vstup -->
            <div class="valid-key-show d-flex justify-content-center my-5 align-content-center flex-wrap form-inline">

                <div class="form-group">
                    <label for="position" class="control-label"><b>Poloha guličky (0 - 100 cm):</b> </label>
                    <input class="form-control" type="number" name="position" id="positionInput" value="0"  data-placement="bottom" title="Platné hodnoty: 0 - 100" onchange="changePosition('sk',<?=$valid?>)">
                </div>
                <div class="form-group">
                    <div class="checkbox-inline">
                        <label class="control-label"><input type="checkbox"  name="animationCheck" id="animationCheck" onchange="toggleDisplay(this.checked,'animation-toggle')" checked>Zobraziť animáciu</label>
                    </div>
                    <div class="checkbox-inline">
                        <label class="control-label"><input type="checkbox" name="graphsCheck" id="graphsCheck" onchange="toggleDisplay(this.checked,'graph-toggle')" checked>Zobraziť grafy</label>
                    </div>
                </div>

            </div>
        </div>

        <!-- animacia -->
        <div class="d-flex justify-content-center flex-wrap">
            <div id="animation-div" class="animation-toggle valid-key-show">
                <svg viewBox="0 0 700 400" preserveAspectRatio="xMinYMin" id="animation">
                    <g id="ballbeam">
                        <rect id="beam" x="0" y="200" width="675" height="10" fill="lightblue"/>
                        <circle id="ball" cx="<?=0*600+25+9?>" cy="191" r="9" fill="pink"/>
                    </g>
                    <rect id="base" x="0" y="0" width="25"  height="400" fill="black"/>
                </svg>
            </div>
        </div>


        <!-- grafy -->
        <div class="d-flex justify-content-center flex-wrap" id="graphs-container">
            <div class="graph-toggle valid-key-show" id="positionGraph"></div>
            <div class="graph-toggle valid-key-show" id="angleGraph"></div>
        </div>


        <footer class="page-footer font-small mt-5 bg-light">
            <div class="footer-copyright text-center py-3">
            Copyright &copy; 2020 Simona Lopatniková, Petra Kirschová, Matúš Hudák, Veronika Szabóová<br>
            Fakulta elektrotechniky a informatiky Slovenskej technickej univerzity v Bratislave
            </div>
        </footer>


        <?php
            //zobrazenie stranky po zadani spravneho api kluca
            if (isset($_POST["apiKeySubmit"])){
                $key = $_POST["apiKey"];
                $valid = ($key === $apiKey);
                $encodedValid = json_encode($valid);
                echo "<script>";
                echo "toggleVisibility($encodedValid,'valid-key-show');";
                echo "</script>";
            }
        ?>


    </body>

</html>



