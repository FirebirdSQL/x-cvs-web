<?php
if (eregi("page_ostenried_1.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Some Stored Procs to Massage Dates</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td align=left>
<font size="-1"><b>from <a href="mailto:chef_007@gmx.net" style="text-decoration:none;color:#800080;">Markus Ostenried</a><hr size=1></td>
</tr>

<tr>
<td colspan=2><font face="Verdana" size="-1">
I've translated some procedures from RxLib and the <a href="http://delphi-jedi.org/CODELIBJCL" style="text-decoration:none;color:#800080;"><b>Jedi Code Library</b></a>: JclDateTime.pas to SQL. Works fine for me.
Maybe someone else can benefit from them, too. 
Or report me some unknown bugs :-)
<p>
The HTML below uses the &lt;pre&gt; &amp; &lt;/pre&gt; tags to preformat the text and avoid embedded HTML tags.  If you save the page source, you will be able to copy/paste the code sections directly into a fresh text file. </font>
<font face="Courier New"><pre>

CREATE PROCEDURE  PROC_INCDATE( IN_DATE      TIMESTAMP
                              , IN_SECONDS  INTEGER
                              , IN_MINUTES  INTEGER
                              , IN_HOURS    INTEGER
                              , IN_DAYS     INTEGER
                              , IN_MONTHS   INTEGER
                              , IN_YEARS    INTEGER )
                      RETURNS ( OUT_RESULT  TIMESTAMP )
AS
DECLARE VARIABLE var_SecondsOfTime INTEGER;
DECLARE VARIABLE var_Time          TIME;
DECLARE VARIABLE var_Day           INTEGER;
DECLARE VARIABLE var_Month         INTEGER;
DECLARE VARIABLE var_Year          INTEGER;
DECLARE VARIABLE var_ModHour       INTEGER;
DECLARE VARIABLE var_ModMonth      INTEGER;
DECLARE VARIABLE var_DaysPerMonth  INTEGER;
BEGIN
   IF (IN_SECONDS IS NULL) THEN IN_SECONDS = 0;
   IF (IN_MINUTES IS NULL) THEN IN_MINUTES = 0;
   IF (IN_HOURS   IS NULL) THEN IN_HOURS   = 0;
   IF (IN_DAYS    IS NULL) THEN IN_DAYS    = 0;
   IF (IN_MONTHS  IS NULL) THEN IN_MONTHS  = 0;
   IF (IN_YEARS   IS NULL) THEN IN_YEARS   = 0;

   /* function IncTime(ADateTime: TDateTime; Hours, Minutes, */
   /*   Seconds, MSecs: Integer): TDateTime;  */
   /* Result := ADateTime + (Hours div 24) + (((Hours mod 24) */
   /*   * 3600000 + Minutes * 60000 + Seconds * 1000 + MSecs) / MSecsPerDay); */

   var_Time = CAST(in_Date AS TIME);
   var_SecondsOfTime = EXTRACT(HOUR   FROM var_Time)*60*60 +
                       EXTRACT(MINUTE FROM var_Time)*60 +
                       EXTRACT(SECOND FROM var_Time) +
                       in_Hours*60*60 + in_Minutes*60 + in_Seconds;
   in_Days = in_Days + CAST( var_SecondsOfTime/(24*60*60) - 0.49 AS INTEGER );

   EXECUTE PROCEDURE PROC_MODULUS( var_SecondsOfTime, 86400 ) 
                RETURNING_VALUES ( var_SecondsOfTime );
   var_Time = CAST( '00:00' AS TIME );
   var_Time = var_Time + var_SecondsOfTime;

   EXECUTE PROCEDURE PROC_DecodeDate( in_Date ) 
     RETURNING_VALUES ( var_Year ,var_Month, var_Day );
   var_Year = var_Year + in_Years;
   var_Year = var_Year + CAST(in_Months/12-0.49 AS INTEGER);

   EXECUTE PROCEDURE PROC_MODULUS( in_Months, 12 ) RETURNING_VALUES ( var_ModMonth );
   var_Month = var_Month + var_ModMonth;

   IF (var_Month < 1) THEN 
   BEGIN
     var_Month = var_Month + 12;
     var_Year = var_Year - 1;
   END
   ELSE
   IF (var_Month > 12) THEN 
   BEGIN
     var_Month = var_Month - 12;
     var_Year = var_Year + 1;
   END

   EXECUTE PROCEDURE PROC_DAYSOFMONTH( var_Year, var_Month ) 
                    RETURNING_VALUES ( var_DaysPerMonth );
   IF (var_Day > var_DaysPerMonth) THEN 
   BEGIN
     EXECUTE PROCEDURE PROC_DAYSOFMONTH( var_Year, var_Month ) 
                    RETURNING_VALUES ( var_Day );
   END

   EXECUTE PROCEDURE PROC_EncodeDate( var_Year, var_Month, var_Day ) 
                   RETURNING_VALUES ( out_Result );
   out_Result = out_Result + in_Days;
   out_Result = CAST(out_Result AS DATE) + var_Time;

/*
function IncDate(ADate: TDateTime; Days, Months, Years: Integer): TDateTime;
var
   D, M, Y: Word;
   Day, Month, Year: Longint;
begin
   DecodeDate(ADate, Y, M, D);
   Year := Y;
   Month := M;
   Day := D;
   Inc(Year, Years);
   Inc(Year, Months div 12);
   Inc(Month, Months mod 12);
   if Month < 1 then begin
     Inc(Month, 12);
     Dec(Year);
   end
   else if Month > 12 then begin
     Dec(Month, 12);
     Inc(Year);
   end;
   if Day > DaysPerMonth(Year, Month) then
     Day := DaysPerMonth(Year, Month);
   Result := EncodeDate(Year, Month, Day) + Days + Frac(ADate);
end;
*/
END


CREATE PROCEDURE  PROC_MODULUS( DIVIDEND  INTEGER
                              , DIVISOR   INTEGER )
                      RETURNS ( RESULT  INTEGER )
AS
BEGIN
   /* This procedure calculates the modulus of two numbers */
   IF(Dividend = 0) THEN Result = 0;
   ELSE
     Result = Dividend-(CAST((Dividend / Divisor)-0.49 AS INTEGER)*Divisor);
   /* Suspend;  Ed.- this isn't recommended */
END


CREATE PROCEDURE  PROC_DECODEDATE( ADATE  TIMESTAMP )
                         RETURNS ( AYEAR  INTEGER
                                , AMONTH  INTEGER
                                , ADAY    INTEGER )
AS
BEGIN
   AYear  = Extract (Year from ADate);
   AMonth = Extract (Month from ADate);
   ADay   = Extract (Day from ADate);
   Suspend;
END

CREATE PROCEDURE  PROC_ENCODEDATE( AYEAR  INTEGER
                                 , AMONTH INTEGER
                                 , ADAY   INTEGER )
                         RETURNS ( RESULT DATE )
AS
BEGIN
   Result = cast( ADay || '.' || AMonth || '.' || AYear as DATE);
   suspend;
END

CREATE PROCEDURE  PROC_DAYSOFMONTH( AYEAR  INTEGER
                                  , AMONTH INTEGER )
                          RETURNS ( RESULT INTEGER )
AS
DECLARE VARIABLE WorkDate   DATE;
BEGIN
   Result = 31;
   WHILE (Result > 28 AND WorkDate IS NULL) DO
   BEGIN
     EXECUTE PROCEDURE Proc_EncodeDate(AYear, AMonth, Result) 
                      RETURNING_VALUES(WorkDate);
     WHEN ANY DO Result = Result -1;
   END
END
</pre>
</font>
<font face="Verdana" size="-1">
Below is an SP for calculating Easter Sunday. 
</font>
<font face="Courier New">
<pre>
CREATE PROCEDURE  PROC_EASTERSUNDAY( IN_YEAR  INTEGER )
                           RETURNS ( OUT_DATE  DATE )
AS
DECLARE VARIABLE var_Month  INTEGER;
DECLARE VARIABLE var_Day    INTEGER;
DECLARE VARIABLE var_Moon   INTEGER;
DECLARE VARIABLE var_Epact  INTEGER;
DECLARE VARIABLE var_Sunday INTEGER;
DECLARE VARIABLE var_Gold   INTEGER;
DECLARE VARIABLE var_Cent   INTEGER;
DECLARE VARIABLE var_Corx   INTEGER;
DECLARE VARIABLE var_Corz   INTEGER;
DECLARE VARIABLE var_Tmp    INTEGER;
BEGIN
   /*{ The Golden Number of the year in the 19 year Metonic Cycle: }*/
   EXECUTE PROCEDURE PROC_MODULUS( :in_Year, 19 ) RETURNING_VALUES ( :var_Gold );
   var_Gold = var_Gold + 1;
   /*{ Calculate the Century: }*/
   var_Cent = CAST(in_Year/100-0.49 AS INTEGER) + 1;
   /*{ Number of years in which leap year was dropped in order... }*/
   /*{ to keep in step with the sun: }*/
   var_Corx = (3 * var_Cent);
   var_Corx = CAST(var_Corx/4-0.49 AS INTEGER) - 12;
   /*{ Special correction to syncronize Easter with moon's orbit: }*/
   var_Corz = (8 * var_Cent + 5);
   var_Corz = CAST(var_Corz/25-0.49 AS INTEGER) - 5;
   /*{ Find Sunday: }*/
   var_Sunday = (5 * in_Year);
   var_Sunday = CAST(var_Sunday/4-0.49 AS INTEGER) - var_Corx - 10;
   /*{ Set Epact - specifies occurrence of full moon: }*/
   var_Epact = (11 * var_Gold + 20 + var_Corz - var_Corx);

   EXECUTE PROCEDURE PROC_MODULUS( :var_Epact, 30 ) RETURNING_VALUES ( :var_Epact );
   if (var_Epact < 0) then begin
     var_Epact = var_Epact + 30;
   end
   if (((var_Epact = 25) and (var_Gold > 11)) or (var_Epact = 24)) then begin
     var_Epact = var_Epact + 1;
   end
   /*{ Find Full Moon: }*/
   var_Moon = 44 - var_Epact;
   if (var_Moon < 21) then begin
     var_Moon = var_Moon + 30;
   end
   /*{ Advance to Sunday: }*/
   var_Tmp = var_Sunday + var_Moon;

   EXECUTE PROCEDURE PROC_MODULUS( :var_Tmp, 7 ) RETURNING_VALUES ( :var_Tmp );
   var_Moon = var_Moon + 7 - var_Tmp;
   if (var_Moon > 31) then begin
     var_Month = 4;
     var_Day = var_Moon - 31;
   end else begin
     var_Month = 3;
     var_Day = var_Moon;
   end

   EXECUTE PROCEDURE PROC_EncodeDate( :in_Year, :var_Month, :var_Day ) 
                   RETURNING_VALUES ( :out_DATE );
   Suspend;
END
</pre></font>

<font face="Verdana" size="-1">
This SP calculates the German &quot;Feiertage&quot; (feast days).
</font><br>
<font face="Courier New"><pre>
CREATE PROCEDURE  PROC_CALCFEIERTAGE( IN_START  DATE
                                     , IN_STOP  DATE )
                            RETURNS ( OUT_START TIMESTAMP
                                    , OUT_STOP  TIMESTAMP
                                    , OUT_NAME  VARCHAR(50) )
AS
DECLARE VARIABLE var_Year     INTEGER;
DECLARE VARIABLE var_StopYear INTEGER;
DECLARE VARIABLE var_Ostern   DATE;
BEGIN
   /* returns german "Feiertage" which are in range of the input params */
   /* author: Markus Ostenried, chef_007@gmx.net, markus@authentic-media.com */

   var_Year     = EXTRACT( YEAR FROM in_Start );
   var_StopYear = EXTRACT( YEAR FROM in_Stop  );
   WHILE (var_Year <= var_StopYear) DO BEGIN

     /* Neujahr */
     out_Start = CAST('01.01.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Neujahr';
       Suspend;
     END

     /* Heilige drei Koenige */
     out_Start = CAST('06.01.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Heilige drei Koenige';
       Suspend;
     END

     /* Maifeiertag */
     out_Start = CAST('01.05.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Maifeiertag';
       Suspend;
     END

     /* Tag der dt. Einheit */
     out_Start = CAST('03.10.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Tag der dt. Einheit';
       Suspend;
     END

     /* 1. Weihnachtsfeiertag */
     out_Start = CAST('25.12.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = '1. Weihnachtsfeiertag';
       Suspend;
     END

     /* 2. Weihnachtsfeiertag */
     out_Start = CAST('26.12.' || var_Year || ' 00:00:00' AS TIMESTAMP);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = '2. Weihnachtsfeiertag';
       Suspend;
     END

     EXECUTE PROCEDURE PROC_EASTERSUNDAY( var_Year ) 
                       RETURNING_VALUES ( var_Ostern );

     /* Ostersonntag */
     out_Start = CAST(var_Ostern AS DATE) + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Ostersonntag';
       Suspend;
     END

     /* Ostermontag */
     out_Start = CAST(var_Ostern AS DATE) + 1 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Ostermontag';
       Suspend;
     END

     /* Aschermittwoch */
     out_Start = CAST(var_Ostern AS DATE) - 46 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Aschermittwoch';
       Suspend;
     END

     /* Karfreitag */
     out_Start = CAST(var_Ostern AS DATE) - 2 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Karfreitag';
       Suspend;
     END

     /* Christi Himmelfahrt */
     out_Start = CAST(var_Ostern AS DATE) + 39 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Christi Himmelfahrt';
       Suspend;
     END

     /* Pfingstsonntag */
     out_Start = CAST(var_Ostern AS DATE) + 49 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Pfingstsonntag';
       Suspend;
     END

     /* Pfingstmontag */
     out_Start = CAST(var_Ostern AS DATE) + 50 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Pfingstmontag';
       Suspend;
     END

     /* Fronleichnam */
     out_Start = CAST(var_Ostern AS DATE) + 60 + CAST('00:00:00' AS TIME);
     out_Stop  = CAST(out_Start  AS DATE) + CAST('23:59:59' AS TIME);
     IF (NOT (out_STOP < in_START) AND NOT (out_START > in_STOP)) THEN BEGIN
       OUT_NAME = 'Fronleichnam';
       Suspend;
     END

     var_Year = var_Year + 1;
   END

/*
   http://www.weltzeituhr.com/infos/kirchliche_feiertage.htm
   Aschermittwoch      : 46 Tage vor Ostersonntag
   Karfreitag          :  2 Tage vor Ostersonntag
   Christi Himmelfahrt : 39 Tage nach Ostersonntag
   Pfingstsonntag      : 49 Tage nach Ostersonntag
   Fronleichnam        : 60 Tage nach Ostersonntag
*/

END
</pre></font>
</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->

</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>