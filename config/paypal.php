<?php
return array(
    'client_id' =>'AS73eGH9UUncnI5Yi-4xD3TWdd3q0gvru9cccOYEJiCB2aXsvwEAljZ9-oht0ihGfzTdbotQK8xczGIa',
    'secret' => 'EJmrxNffBwWkNH_425TQJRA_QWeaxy0ASDvhZpBFASjSN8JpwR62nhchuRlXdA_rG6bfE5ijRjxxKMx6',
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
