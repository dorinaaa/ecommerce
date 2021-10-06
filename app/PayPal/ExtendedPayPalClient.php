<?php

namespace App\PayPal;

use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use Sample\PayPalClient;


class ExtendedPayPalClient extends PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public static function client()
    {
        return new ExtendedPayPalHttpClient(self::environment());
    }

    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * ProductionEnvironment.
     */
    public static function environment()
    {
        $clientId = 'AWXc5pYLLMM4AGXQKWfHzURQFySm15MFb8uEHhv8bM7Qd_RXAMUKw6s2uY4U5w6ta5lW4LnUrueVbrce';
        $clientSecret = 'EFiAAuWfyZNvUum6zwYlkaiJbDLuL0l42Gotdquev1k6_3fycdIfjWJB4D6ecsbeAJR26t6NnPQPCjJJ';
        $mode = 'sandbox';
        if ($mode == 'sandbox'){
            return new SandboxEnvironment($clientId, $clientSecret);
        }
        return new ProductionEnvironment($clientId, $clientSecret);
    }
}
