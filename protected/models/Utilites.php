<?php


/**
 * Description of Utilites
 *
 * @author alterego4
 */
class Utilites {
    //put your code here
        public static function random_password( $length = 18 ) 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
        
        public static function activation_link( $length = 18 ) 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
}
