<?php


namespace App\PayPal;


use PayPalCheckoutSdk\Core\PayPalHttpClient;

class ExtendedPayPalHttpClient extends PayPalHttpClient
{
    protected function getCACertFilePath()
    {
        return 'C:\xampp\php73\extras\ssl\cacert.pem';
    }
}
