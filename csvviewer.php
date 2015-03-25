<?php

include 'classes/file.php';
include 'classes/cmdln.php';
include 'classes/table_dialog.php';

$args = Cmdln::parse();
$string_array = File::load_csv($args['filename']);
Table_Dialog::draw_result($string_array);
Table_Dialog::draw_menu();
