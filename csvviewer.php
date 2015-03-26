<?php

//exec("chcp 65001");

include 'classes/file.php';
include 'classes/cmdln.php';
include 'classes/table_dialog.php';
include 'classes/pager.php';
include 'classes/pagemanager.php';

function erste_seite_aufblaettern($pager){
    $args = Startdialog::parsen();
    $pagemanager = File::load_csv($args['filename']);
    $aktuelle_pos = $pager->berechne_start_pos();
    $csv_seite_eins = $pagemanager->seite_bilden($aktuelle_pos);
    //$csv_seite_eins = seite_eins_bilden($csv_string);
    
    Table_Dialog::ergebnis_zeichnen($csv_seite_eins);
}

function letzte_seite_aufblaettern($pager){
    $args = Startdialog::parsen();
    $pagemanager = File::load_csv($args['filename']);
    $aktuelle_pos = $pager->berechne_letzte_pos($pagemanager->anz_zeilen, $pagemanager->limit);
    $csv_letzte_seite = $pagemanager->seite_bilden($aktuelle_pos);
    //$csv_letzte_seite = letzte_seite_bilden($csv_string);

    Table_Dialog::ergebnis_zeichnen($csv_letzte_seite);
}

function naechste_seite_aufblaettern($pager){
    $args = Startdialog::parsen();
    $pagemanager = File::load_csv($args['filename']);
    $aktuelle_pos = $pager->berechne_naechste_pos($pagemanager->anz_zeilen, $pagemanager->limit);
    $csv_letzte_seite = $pagemanager->seite_bilden($aktuelle_pos);
    //$csv_letzte_seite = letzte_seite_bilden($csv_string);

    Table_Dialog::ergebnis_zeichnen($csv_letzte_seite);
}

function main(){
    $pager = new Pager();
    $tabellen_dialog = new Table_Dialog($pager);
    
    erste_seite_aufblaettern($pager);
    
    $tabellen_dialog->warte_auf_taste(
                "erste_seite_aufblaettern",
                "letzte_seite_aufblaettern",
                "naechste_seite_aufblaettern"
            );
}

main();
