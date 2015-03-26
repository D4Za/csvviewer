<?php

class Startdialog {
  public static function parsen(){
      $args['filename'] = $_SERVER['argv'][1];
      return $args;
  }
}
