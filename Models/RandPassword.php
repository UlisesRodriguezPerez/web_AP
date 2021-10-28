<?php

namespace App\Models;
use App\Config;

use Traversable;


class RandPassword{
    private static $caracteres = [
        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
        "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
        "0","1","2","3","4","5","6","7","8","9","-","_"
    ];

    public static function newPassword(){
        try {  
            $password = "";
            $passwordLen = random_int(5, 7);
            for($i = 0; $i < $passwordLen; $i++){
                $password = $password . self::$caracteres[random_int(0, count(self::$caracteres))];
            }
            return $password;
        } catch (\PDOException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    
}

?>