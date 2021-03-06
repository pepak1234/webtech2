<!-- dokumentacia [Simona] -->

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <script src="js_scripts/general.js"></script>
    <script src="js_scripts/formular.js"></script>
    <title>Dokumentácia</title>
</head>

<body>
<header class="navbar-light bg-light">
    <h1>DOKUMENTÁCIA</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">DOMOV</a></li>
            <li class="nav-item"><a href="command.php" class="nav-link">SPUSTIŤ PRÍKAZ</a></li>
            <li class="nav-item"><a href="ballbeam.php" class="nav-link">GULIČKA</a></li>
            <li class="nav-item"><a href="plane.php" class="nav-link">LIETADLO</a></li>
            <li class="nav-item"><a href="pendulum.php" class="nav-link">KYVADLO</a></li>
            <li class="nav-item"><a href="damping.php" class="nav-link">AUTO</a></li>
            <li class="nav-item"><a href="statistika.php" class="nav-link">ŠTATISTIKA</a></li>
            <li class="active nav-item"><a href="documentation.php" class="nav-link">DOKUMENTÁCIA</a></li>
            <li class="nav-item"><a href="documentation_english.php" class="nav-link">EN</a></li>
        </ul>
    </nav>
</header>

<div class="text mt-4">
    <u>Autori:</u>
        <ul>
            <li>Petra Kirschová</li>
            <li>Simona Lopatniková</li>
            <li>Veronika Szabóová</li>
            <li>Matúš Hudák</li>
        </ul>
     <p>Github repozitár: <a href="https://github.com/pepak1234/webtech2">TU</a></p>

    <u>Inštalácia sendmail:</u> <br>
    <code>sudo apt-get install sendmail</code><br>
    <code>sudo sendmailconfig</code><br>

    <br><u>Úprava /etc/hosts:</u><br>
    127.0.0.1 localhost <span class="zvyrazni">localhost.localdomain os-webtech3-1</span><br>

    <br><u>Inštalácia Octave: </u><br>
    <code>sudo apt install octave</code><br>

    <br><u>Inštalácia liboctave-dev (potrebné pre inštaláciu packageov z octave forge): </u><br>
    <code>sudo apt install liboctave-dev</code><br>

    <br><u>Inštalácia control package: </u><br>
    <code>sudo pkg install -global -forge control</code><br>

    <br><p><u>Animácie:</u></p>
    <p><b>Inverzné kyvadlo:</b></p>
    <ul>
        <li>vstup: požadovaná nová poloha kyvadla r</li>
        <li>výstup: aktuálna pozícia kyvadla x(:,1)</li>
        <li>aktuálny uhol kyvadla (náklon vertikálnej tyče – uhol v radiánoch) x(:,3)</li>
    </ul>
    <p><u>Podrobnejšie: </u> <a href="http://ctms.engin.umich.edu/CTMS/index.php?example=InvertedPendulum&section=SystemModeling">TU</a></p>

    <p><b>Gulička na tyči:</b></p>
    <ul>
        <li>vstup: požadovaná nová poloha guličky na tyči r</li>
        <li>výstup: aktuálna pozícia guličky N*x(:,1)</li>
        <li>aktuálny náklon tyče (uhol v radiánoch)  x(:,3)</li>
    </ul>
    <p><u>Podrobnejšie: </u> <a href="http://ctms.engin.umich.edu/CTMS/index.php?example=BallBeam&section=SystemModeling">TU</a></p>

    <p><b>Tlmič auta:</b></p>
    <ul>
        <li>vstup: požadovaná výška skokovej prekážky r</li>
        <li>výstup: aktuálna pozícia vozidla x(:,1) </li>
        <li>aktuálna pozícia kolesa x(:,3)</li>
    </ul>
    <p><u>Podrobnejšie: </u> <a href="http://ctms.engin.umich.edu/CTMS/index.php?example=Suspension&section=SystemModeling">TU</a></p>

    <p><b>Náklon lietadla: </b></p>
    <ul>
        <li>vstup: požadovaný nový náklon lietadla r</li>
        <li>výstup: aktuálny náklon lietadla x(:,3)</li>
        <li>aktuálny náklon zadnej klapky r*ones(size(t))*N-x*K'</li>
    </ul>
    <p><u>Podrobnejšie: </u> <a href="http://ctms.engin.umich.edu/CTMS/index.php?example=AircraftPitch&section=SystemModeling">TU</a></p>
</div>

<footer class="page-footer font-small mt-5 bg-light">
    <div class="footer-copyright text-center py-3">
        Copyright &copy; 2020 Simona Lopatniková, Petra Kirschová, Matúš Hudák, Veronika Szabóová<br>
        Fakulta elektrotechniky a informatiky Slovenskej technickej univerzity v Bratislave
    </div>
</footer>


</body>

</html>



