<?php

function est_un_lieu(string $ref_page):bool {
        
    if (substr($ref_page, 0, 5) == "lieu_"){
        return True;
    }
    else{
        return False;
    }

}

assert(est_un_lieu("lieu_10"));
assert(!est_un_lieu("lieu0"));
assert(!est_un_lieu(12));
assert(!est_un_lieu(""));



?>