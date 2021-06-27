<?php
class Config{
    
    const DATE_FORMAT = "Y-m-d H:i:s";


    public static function DB_HOST(){
        return Config::get_env("DB_HOST", "192.168.1.59");
      }
      public static function DB_USERNAME(){
        return Config::get_env("DB_USERNAME", "admin");
      }
      public static function DB_PASSWORD(){
        return Config::get_env("DB_PASSWORD", "PremiumTPLINK1");
      }
      public static function DB_SCHEME(){
        return Config::get_env("DB_SCHEME", "happyHour");
      }
      public static function DB_PORT(){
        return Config::get_env("DB_PORT", "3306");
      }
      public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
      }
}

?>
