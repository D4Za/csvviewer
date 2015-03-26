<?php

class File {
    public static function load_csv($filename){
        $csv_string = "";
        $row_array = file($filename);
        foreach ($row_array as $row) {
            $csv_string .= $row . "|";
        }
        $pagemanager = new Pagemanager($csv_string);
        return $pagemanager;
    }
}
