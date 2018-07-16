<?php
    
    $location = $data['location'];

    if ($location) {
        header('Location: ' . DIR . $location,true,301);
        die();
    }

?>