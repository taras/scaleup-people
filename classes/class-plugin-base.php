<?php
class ScaleUp_People_Plugin {

  private static $_args;

  private static $_this;

  private static $_people;

  public static function this() {
    return self::$_this;
  }

  function __construct() {

    self::$_this = $this;
    self::$_people = new ScaleUp_People();

  }
}