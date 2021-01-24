<?php

function show($vestiti){
    echo "<h1 style='text-align: center'>Show Totali</h1><table style='width:50%; margin:auto'>
    <tr><th border:solid 2px; border-radius: 5px'>Taglia</th><th style='width:auto; border:solid 2px; border-radius: 5px'>Quantita</th><th style='width:auto; border:solid 2px; border-radius: 5px'>Prezzo</th></tr>";

    for ($i=0; $i < count($vestiti); $i++) { 
        echo "<td>";
        for($j=0; $j < count($vestiti[$i]); $j++) { 
            echo "<td style='width:auto; border:solid 2px; border-radius: 5px'>".$vestiti[$i][$j]."</td>";
        }
        echo "</tr>";
    }
    echo "<table>";
}

$vestiti = array
(
array("fghfg","fghfg","fghfg"),
array("fhf","fhf","fghfg"),
array("fghfg", "hjvjh","fghfg"),
array("fghfg", "hjvjh","fghfg")
);
show($vestiti);