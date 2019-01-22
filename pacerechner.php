       <h2>pacerechner.</h2>
               <div id="uberschrift"><strong>pacerechner</strong></div>
<?php
echo "<form action='#' method='post'>";
echo "<input type='input' placeholder='Distanz' name='distanz' /><br/>";
echo "<input type='input' placeholder='Zeit'  name='zeit' /> Eingabe ([HH]:[MM]:[SS])<br/><br/>";
echo "<input type='submit' name='absenden' value='Pacerechner' />";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['distanz']) && isset($_POST['zeit'])) {
			//dynamisch machen
			$kilometer = $_POST['distanz'];
			$zeit = $_POST['zeit'];
	
			$text = "";
			
			$kilometer = str_replace(",",".",$kilometer);

			$time=explode(":",$zeit);

			if(count($time)>2){
				$abs1 = $time[0]*60;
				$abs2 = trim($time[1],0);
				$abs = $abs1+$abs2;


				$zielzeit=$abs .".". $time[2];
				
				$text = "Du l&auml;ufst ".$kilometer."km in ".$zeit."h.<br/>";
				
			} else {
				$zielzeit = $time[0] .".". $time[1];
				
				$text = "Du l&auml;ufst ".$kilometer."km in ".$zeit."min.<br/>";
			}

			$wert = $zielzeit / $kilometer;

			$pace_min = floor($wert);

			$tmp = $wert - $pace_min;
			$pace_sek = round($tmp * 60);
			
			echo $text; 

			echo $pace_min.":".$pace_sek." min/km<br/>";

			//KMH berechnen
			$pace = $pace_min + $tmp;
			$pace_kmh = 60 / $pace;
			echo round($pace_kmh,2)." km/h<br/>";

	} 
}
echo "<br/>";
echo "<form action='#' method='post'><label style='font-size: 10px;'>&copy;mockauer ".date('Y')."</label> <input type='submit' name='version' class='app' value='Version 1.0'/></form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['version'])){
		echo "<strong class='footer'>Versionsgeschichte</strong>";
		echo "<ul class='footer'><u>Version 1.0</u>";
		echo "<li class='footer'>Pacerechner funktioniert</li></ul>";
	}
}

?>
<br/>
