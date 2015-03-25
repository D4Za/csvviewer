<?php

class Table_Dialog {
    public static function draw_menu(){
        print_r('(N)ext page, (P)revious page, (F)irst page, (L)ast page, e(X)it');
    }

    public static function draw_result($string_array){
        foreach ($string_array as $row) {
            print_r($row);
        }
    }
}
