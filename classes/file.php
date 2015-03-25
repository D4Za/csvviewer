<?php

class File {
    public static function load_csv($filename){
        $row_array = file($filename);
        return $row_array;
    }
}
