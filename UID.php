<?php
function UID($nbr_aleatoire) {
    $liste_cara = [
        ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
        ["a", "b", "c", "d", "e", "f", "g", "h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"],
        ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
    ];

    $liste = "";
    for ($i = 0; $i < $nbr_aleatoire; $i++) {
        $index_one = rand(0, 2); 
        $index_two = rand(0, count($liste_cara[$index_one])-1);
        $liste.= $liste_cara[$index_one][$index_two];
    }
    return $liste;
    
}