<?php

function recommendMusic($music) {
 $musicMenu = [
 "Feliz" => "Condenados al desastre - Reality, Hard GZ",
 "Triste" => "Shars 2020 - AlSafir",
 "Energético" => "Manhattan - D0ble 0",
 "Relajado" => "Lady madriZz - Céro",
 "Inspirado" => "Extrarradio - Midas Alonso, Natos y Waor",
 "Estresado"=> "Récord - Kaze",
 ];
 if (array_key_exists($music, $musicMenu)) {
 return "Recomendamos: " . $musicMenu[$music];
 }
}
?>
