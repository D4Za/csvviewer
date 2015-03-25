<?php

class Cmdln {
  public static function parse(){
      $args['filename'] = $_SERVER['argv'][1];
      return $args;
  }
}
