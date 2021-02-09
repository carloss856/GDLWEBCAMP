<?php
    require __DIR__  . '/PayPal/autoload.php';
    
    define('URL_SITIO', 'http://localhos/gdlwebcamp/');

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'ATSpoShI69AazAH9ad5PNnoCJF7FQ5xEzVj1Ejuha6tkq2h06x_Y6rOPiY1fy7ckKX3fmVHl-yI6mw-6', //clienteID
            'ELNdBCD4hzxd1O1p--TRZmgunTukZ4V-SLJ03aMQTY-ujXbflD-rOKLj4NmA_mloV_hVGBocgSjIDiv5' //Secret
        )
    );
    
?>