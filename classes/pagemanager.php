<?php

class Pagemanager {
    
    public $limit = 10;
    
    private $zeilen;
    
    private $header;
    
    public $anz_zeilen;
    
    public function __construct($csv_string) {
        $csv_array = explode("|", $csv_string);
        $this->header = $csv_array[0];
        for ($i = 0; $i < count($csv_array)-1; $i++) {
            $this->zeilen[] = $csv_array[$i];
        }        
        $this->anz_zeilen = count($this->zeilen);
    }
    
    public function seite_bilden($aktuelle_pos){
        $csv_page = array();
        $i = 0;
        $csv_page[] = $this->header;
        for ($i = $aktuelle_pos; $i < $this->limit + $aktuelle_pos; $i++) {
            if ($i >= $this->anz_zeilen) {
                break;
            }
            $csv_page[] = $this->zeilen[$i];
        }
        return $csv_page;
    }
}
