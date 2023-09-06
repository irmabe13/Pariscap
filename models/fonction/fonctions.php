<?php

function est_un_lieu(string $ref_page): bool
{

    return substr($ref_page, 0, 5) == "lieu_";

}


    // var_dump($reqDesservir->fetchAll(PDO::FETCH_ASSOC));



assert(est_un_lieu("lieu_10"));
assert(!est_un_lieu("lieu0"));
assert(!est_un_lieu(12));
assert(!est_un_lieu(""));
assert(!est_un_lieu("lieu"));

function search_bar(){
    ?><script>const lieux_objects =<?php json_encode(getLieuxObject());?>;</script><?php
}


    ?>