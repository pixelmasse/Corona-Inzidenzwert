/*
  Corona-Inzidenzwert auslesen
  (c) 2021 LK, pixelmasse
*/

  $(document).ready(function() {
    get7TagesInzidenz(10);          // Landkreis-ObjectID, z.B. 10 = LK Plön
  });

  function get7TagesInzidenz(lkObjectId) {
    var restServiceUrl = 'https://services7.arcgis.com/mOBPykOjAyBO2ZKk/arcgis/rest/services/RKI_Landkreisdaten/FeatureServer/0/query?where=OBJECTID='+lkObjectId+'&outFields=OBJECTID,death_rate,cases,deaths,cases_per_100k,cases_per_population,BL,BL_ID,county,last_update,cases7_per_100k,recovered,cases7_bl_per_100k&outSR=4326&f=json';

    $.get(restServiceUrl, function(response) {
      if(response != "") {
        var jsonLandkreis = JSON.parse(response);
        jsonLandkreis = jsonLandkreis['features'][0]['attributes'];
        var lkName = jsonLandkreis['county'];
        var lkDatenstand = jsonLandkreis['last_update'];
        var lk7TagesInzidenz = Math.round((jsonLandkreis['cases7_per_100k'] * 100)) / 100;
        if(lk7TagesInzidenz <= 35) {
          $('#covid_wrapper').addClass('gruen');
          $('#iWert').addClass('gruen');
        } else if (lk7TagesInzidenz >35 && lk7TagesInzidenz <=50) {
          $('#covid_wrapper').addClass('gelb');
          $('#iWert').addClass('gelb');
        } else if (lk7TagesInzidenz > 50) {
          $('#covid_wrapper').addClass('rot');
          $('#iWert').addClass('rot');
        }
        var iWert = lk7TagesInzidenz.toString().replace (/\./g, ',');
        $('#iLandkreis').html(lkName);
        $('#iWert').html(iWert);
        $('#iDatenstand').html('Stand: '+lkDatenstand);
        
      }
    });
  }