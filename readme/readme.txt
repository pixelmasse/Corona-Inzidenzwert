Corona-Inzidenzwert
==========================================================

Diese Scripte sollen euch dabei helfen, den Corona-Inzidenzwert für euren Landkreis auszulesen, damit ihr ihn z.B. auf eurer Homepage etc. darstellen könnt.

Zu Abrufen der Daten stehen zwei Möglichkeiten zur Verfügung:
  1. Datenabruf über einen cURL-Aufruf (PHP)
  2. Datenabruf über einen AJAX-Request (JavaScript)

Wer sich ein bisschen auskennt, der erkennt schnell, dass sich die Script für weitere Anwendungsmöglichkeiten leicht erweitern lassen.

In der Datei Landkreise.html findet ihr alle derzeit (23.03.21) verfügbaren ObjectIDs für die Landkreise.
Und nachfolgend habe ich alle zur Verfügung stehenden Rückgabefelder aufgeführt.
Die Liste der Landkreis und Rückgabefelder erhebt nich den Anspruch auf Vollständigkeit!

______
(c) 2021 LK, pixelmasse



Rückgabefelder
==========================================================
  OBJECTID (type: esriFieldTypeOID, alias: OBJECTID, SQL Type: sqlTypeOther, length: 0, nullable: false, editable: false)
  ADE (type: esriFieldTypeSmallInteger, alias: ADE, SQL Type: sqlTypeOther, nullable: true, editable: true)
  GF (type: esriFieldTypeSmallInteger, alias: GF, SQL Type: sqlTypeOther, nullable: true, editable: true)
  BSG (type: esriFieldTypeSmallInteger, alias: BSG, SQL Type: sqlTypeOther, nullable: true, editable: true)
  RS (type: esriFieldTypeString, alias: RS, SQL Type: sqlTypeOther, length: 5, nullable: true, editable: true)
  AGS (type: esriFieldTypeString, alias: AGS, SQL Type: sqlTypeOther, length: 5, nullable: true, editable: true)
  SDV_RS (type: esriFieldTypeString, alias: SDV_RS, SQL Type: sqlTypeOther, length: 12, nullable: true, editable: true)
  GEN (type: esriFieldTypeString, alias: GEN, SQL Type: sqlTypeOther, length: 33, nullable: true, editable: true)
  BEZ (type: esriFieldTypeString, alias: BEZ, SQL Type: sqlTypeOther, length: 16, nullable: true, editable: true)
  IBZ (type: esriFieldTypeSmallInteger, alias: IBZ, SQL Type: sqlTypeOther, nullable: true, editable: true)
  BEM (type: esriFieldTypeString, alias: BEM, SQL Type: sqlTypeOther, length: 13, nullable: true, editable: true)
  NBD (type: esriFieldTypeString, alias: NBD, SQL Type: sqlTypeOther, length: 4, nullable: true, editable: true)
  SN_L (type: esriFieldTypeString, alias: SN_L, SQL Type: sqlTypeOther, length: 2, nullable: true, editable: true)
  SN_R (type: esriFieldTypeString, alias: SN_R, SQL Type: sqlTypeOther, length: 1, nullable: true, editable: true)
  SN_K (type: esriFieldTypeString, alias: SN_K, SQL Type: sqlTypeOther, length: 2, nullable: true, editable: true)
  SN_V1 (type: esriFieldTypeString, alias: SN_V1, SQL Type: sqlTypeOther, length: 2, nullable: true, editable: true)
  SN_V2 (type: esriFieldTypeString, alias: SN_V2, SQL Type: sqlTypeOther, length: 2, nullable: true, editable: true)
  SN_G (type: esriFieldTypeString, alias: SN_G, SQL Type: sqlTypeOther, length: 3, nullable: true, editable: true)
  FK_S3 (type: esriFieldTypeString, alias: FK_S3, SQL Type: sqlTypeOther, length: 1, nullable: true, editable: true)
  NUTS (type: esriFieldTypeString, alias: NUTS, SQL Type: sqlTypeOther, length: 5, nullable: true, editable: true)
  RS_0 (type: esriFieldTypeString, alias: RS_0, SQL Type: sqlTypeOther, length: 12, nullable: true, editable: true)
  AGS_0 (type: esriFieldTypeString, alias: AGS_0, SQL Type: sqlTypeOther, length: 8, nullable: true, editable: true)
  WSK (type: esriFieldTypeString, alias: WSK, SQL Type: sqlTypeOther, length: 23, nullable: true, editable: true)
  EWZ (type: esriFieldTypeInteger, alias: Einwohnerzahl, SQL Type: sqlTypeOther, nullable: true, editable: true)
  KFL (type: esriFieldTypeDouble, alias: KFL, SQL Type: sqlTypeOther, nullable: true, editable: true)
  DEBKG_ID (type: esriFieldTypeString, alias: DEBKG_ID, SQL Type: sqlTypeOther, length: 16, nullable: true, editable: true)
  Shape__Area (type: esriFieldTypeDouble, alias: Shape__Area, SQL Type: sqlTypeDouble, nullable: true, editable: false)
  Shape__Length (type: esriFieldTypeDouble, alias: Shape__Length, SQL Type: sqlTypeDouble, nullable: true, editable: false)
  death_rate (type: esriFieldTypeDouble, alias: Sterberate, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases (type: esriFieldTypeInteger, alias: Fälle, SQL Type: sqlTypeOther, nullable: true, editable: true)
  deaths (type: esriFieldTypeInteger, alias: Todesfälle, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases_per_100k (type: esriFieldTypeDouble, alias: Fälle/100.000 EW, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases_per_population (type: esriFieldTypeDouble, alias: Betroffenenrate %, SQL Type: sqlTypeOther, nullable: true, editable: true)
  BL (type: esriFieldTypeString, alias: Bundesland, SQL Type: sqlTypeOther, length: 256, nullable: true, editable: true)
  BL_ID (type: esriFieldTypeString, alias: Bundesland ID, SQL Type: sqlTypeOther, length: 256, nullable: true, editable: true)
  county (type: esriFieldTypeString, alias: Landkreis, SQL Type: sqlTypeOther, length: 256, nullable: true, editable: true)
  last_update (type: esriFieldTypeString, alias: Aktualisierung, SQL Type: sqlTypeOther, length: 256, nullable: true, editable: true)
  cases7_per_100k (type: esriFieldTypeDouble, alias: Fälle letzte 7 Tage/100.000 EW, SQL Type: sqlTypeOther, nullable: true, editable: true)
  recovered (type: esriFieldTypeInteger, alias: Genesene, SQL Type: sqlTypeOther, nullable: true, editable: true)
  EWZ_BL (type: esriFieldTypeInteger, alias: EWZ_BL, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases7_bl_per_100k (type: esriFieldTypeDouble, alias: Bundeslandweite Fälle der letzten 7 Tage/100.000 EW, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases7_bl (type: esriFieldTypeInteger, alias: Fälle der letzten 7 Tage pro Bundesland, SQL Type: sqlTypeOther, nullable: true, editable: true)
  death7_bl (type: esriFieldTypeInteger, alias: Todesfälle der letzten 7 Tage pro Bundesland, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases7_lk (type: esriFieldTypeInteger, alias: Fälle der letzten 7 Tage pro Landkreis, SQL Type: sqlTypeOther, nullable: true, editable: true)
  death7_lk (type: esriFieldTypeInteger, alias: Todesfälle der letzten 7 Tage pro Landkreis, SQL Type: sqlTypeOther, nullable: true, editable: true)
  cases7_per_100k_txt (type: esriFieldTypeString, alias: Fälle der letzten 7 Tage/100000 EW (Text), SQL Type: sqlTypeOther, length: 256, nullable: true, editable: true)
  AdmUnitId (type: esriFieldTypeInteger, alias: AdmUnitId, SQL Type: sqlTypeInteger, nullable: true, editable: true)


