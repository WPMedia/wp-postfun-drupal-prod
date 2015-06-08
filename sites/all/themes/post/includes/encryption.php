<?php


function encrypt($plain_text) {
    $cipher     = "rijndael-128";
    $mode       = "cbc";
    $secret_key = "_just_post_ride_";
    $iv         = "fedcba9876543210";

    $td = mcrypt_module_open($cipher, "", $mode, $iv);
    mcrypt_generic_init($td, $secret_key, $iv);
    $cyper_text = mcrypt_generic($td, $plain_text);
    $encrypted_text = bin2hex($cyper_text);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);

    return $encrypted_text;
}

function decrypt($encrypted_text) {
    $cipher     = "rijndael-128";
    $mode       = "cbc";
    $secret_key = "_just_post_ride_";
    $iv         = "fedcba9876543210";
    
    $td = mcrypt_module_open($cipher, "", $mode, $iv);
    mcrypt_generic_init($td, $secret_key, $iv);
    $decrypted = mdecrypt_generic($td,pack('H*',$encrypted_text));
    mcrypt_generic_deinit($td);
    $last_char=substr($decrypted,-1);

    return rtrim($decrypted);
}


?>
