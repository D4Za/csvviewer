<?php

class Table_Dialog {
    
    private $pager;
    
    public function __construct($pager) {
        $this->pager = $pager;
    }
    
    private static function menu_zeichnen(){
        print_r('(N)ext page, (P)revious page, (F)irst page, (L)ast page, e(X)it');
    }

    private static function tabellen_inhalt_zeichnen($string_array){
        foreach ($string_array as $row) {
            print_r(trim($row)."\n");
        }
    }
    
    public static function ergebnis_zeichnen($string_array){
        self::tabellen_inhalt_zeichnen($string_array);
        self::menu_zeichnen();
    }
    
    public function warte_auf_taste($bei_f, $bei_l, $bei_n){
        $stdin = fopen("php://stdin", "r");
        while(true){
            $char = fgetc($stdin);
            if($char == "f"){
                $bei_f($this->pager);
            }
            if($char == "l"){
                $bei_l($this->pager);
            }
            if($char == "n"){
                $bei_n($this->pager);
            }
            if($char == "x"){
                exit();
            }
        }
        fclose($stdin);
        return;
    }
}
