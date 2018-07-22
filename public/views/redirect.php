<?php
    
    $location = $data['location'];

    if ($location) {
        header('Location: ' . DIR . $location,true);
        die();
    }

?>