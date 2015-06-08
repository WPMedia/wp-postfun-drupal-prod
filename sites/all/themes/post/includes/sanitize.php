<?php
function sanitize_util($string){
    //decode url
    $string = urldecode  ($string);

    // strips <name> and </name>
    $string = strip_tags($string);

    // replaces eval
    $string = eregi_replace("eval\\((.*)\\)", "",$string);

    // replaces word javascript:
    $string = eregi_replace("javascript:", "",$string);

    // replaces word script
    $string = eregi_replace("script", "",$string);

    //custom replace for braces and ;
    $string= eregi_replace("\\{|\\}|\\[|\\]|;|�|�|�|�", "",$string);
    return $string;
}

?>
