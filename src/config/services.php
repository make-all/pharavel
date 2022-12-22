<?php

return [
    'phorge' => [
        'client_id' => env('PHORGE_CLIENT_ID'),
        'client_secret' => env('PHORGE_CLIENT_SECRET'),
        'redirect' => env('PHORGE_CALLBACK_URL', '/auth/phorge/callback'),
    ],
];
