<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1.0" />  
  <meta name="description" content="Corona-Inzidenzwert">
  <title>Corona-Inzidenzwert</title>
  <link rel="stylesheet" href="css/styles.css?t=<?php echo time(); ?>" type="text/css" media="screen" />
  <script type="text/javascript" src="scripts/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
  <!--
    Dringende Angaben zur Datenquelle: Robert-Koch-Institut (RKI) unter der dl-de/by-2-0 Lizenz!
  -->
  <div class="covid_wrapper">
    <h1 class="text_klein">7-Tage-Inzidenzwert</h1>
    <div id="iLandkreis"></div>
    <div id="iWert"></div>
    <div id="iDatenstand"></div>
    <span class="klein">(Datenquelle: Robert-Koch-Institut (RKI), <a href="https://www.govdata.de/dl-de/by-2-0" target="_blank" title="Lizenz: Datenlizenz Deutschland – Namensnennung – Version 2.0">dl-de/by-2-0</a>)</span>
  </div>
</body>
</html>