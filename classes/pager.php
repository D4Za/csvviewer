<?php

class Pager {

    public $position = 0;
    
    public function berechne_start_pos(){
        $this->position = 1;
        return $this->position;
    }
    
    public function berechne_naechste_pos($anzahl_zeilen, $limit){
        $neue_position = $this->position + $limit;
        if($neue_position > $anzahl_zeilen){
            return $this->position;
        } else {
            $this->position = $this->position + $limit;
            return $this->position;
        }
    }
    
    public function berechne_letzte_pos($anzahl_zeilen, $limit){
        $anzahl_seiten = ($anzahl_zeilen - $anzahl_zeilen % $limit) / $limit;
        $this->position = ($anzahl_seiten) * $limit;
        return $this->position;
    }
    
    public function berechne_vorherige_pos(){
        
    }

}

function letzte_seite_bilden($csv_string) {
    $csv_array = explode("|", $csv_string);
    $limit = 10;
    $anzahl_zeilen = count($csv_array) - 1;
    $anzahl_seiten = ($anzahl_zeilen - $anzahl_zeilen % $limit) / $limit + 1;
    $offset = ($anzahl_seiten - 1) * $limit;
    $csv_page = array();
    $i = 0;
    array_push($csv_page, $csv_array[0]);
    for ($index = $offset; $index < $limit + $offset; $index++) {
        if ($index > $anzahl_zeilen) {
            break;
        }
        array_push($csv_page, $csv_array[$index]);
    }
    return $csv_page;
}

function seite_eins_bilden($csv_string) {
    $csv_array = explode("|", $csv_string);
    $limit = 10;
    $offset = 1;
    $csv_page = array();
    $i = 0;
    array_push($csv_page, $csv_array[0]);
    for ($index = $offset; $index < $limit + $offset; $index++) {
        array_push($csv_page, $csv_array[$index]);
    }
    return $csv_page;
}
