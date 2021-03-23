<?php
  /*
    Dienst zum Abrufen der aktuellen Corona-Inzidenzwerte für einen Landkreis.
      (c) 2021 LK, pixelmasse
    
    Beachtet bitte die Quellenangabe für die abgerufenen Daten:
        Robert-Koch-Institut (RKI)
        Lizenz: Datenlizenz Deutschland – Namensnennung – Version 2.0
        https://www.govdata.de/dl-de/by-2-0
  */

  $lkObjectId = 10; // Landkreis Plön
  $restServiceUrl = 'https://services7.arcgis.com/mOBPykOjAyBO2ZKk/arcgis/rest/services/RKI_Landkreisdaten/FeatureServer/0/query';

  $params = 'where=&objectIds=10&geometryType=esriGeometryEnvelope&spatialRel=esriSpatialRelIntersects&resultType=none&distance=0.0&units=esriSRUnit_Meter&returnGeometry=false&returnGeodetic=false&outFields=OBJECTID,death_rate,cases,deaths,cases_per_100k,cases_per_population,BL,BL_ID,county,last_update,cases7_per_100k,recovered,cases7_bl_per_100k&f=pjson';

  $method = 'GET';

  $headers = array(
      'Accept: application/json',
      'Content-Type: application/json',
  );
   
  $curl = curl_init();
   
  switch($method) {
      case 'GET':
          $restServiceUrl .= '?' . $params;
          break;
      case 'POST':
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
          break;
      case 'PUT':
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
          break;
      case 'DELETE':
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
          $restServiceUrl .= '?' . http_build_query($params);
          break;
  }
   
  curl_setopt($curl, CURLOPT_URL, $restServiceUrl);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   
  $response = curl_exec($curl);
  $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
   
  if ($code == 200) {
    $response = json_decode($response, true);
    echo "<pre>".print_r($response, true)."</pre>";
    
    foreach($response['features'][0]['attributes'] as $field=>$value) {
      $alias = "";
      foreach($response['fields'] as $key=>$aFields) {
        if($aFields['name'] == $field) {
          $alias = utf8_decode($aFields['alias']);
        }
      }
      echo "<br>".$field." (".$alias."): ".utf8_decode($value);
    }
    
  } else {
    echo 'Error '.$code;
  }