<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/3/2019
 * Time: 12:24 PM
 */
class RandomFunctions{
   function __construct()
   { }
   /**********************************************
    * Send Email Varification Link at User email
    **********************************************/
   public function generateRandomString($length)
      {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         return $randomString;
      }
}