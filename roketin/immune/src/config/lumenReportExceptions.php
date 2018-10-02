<?php
return [
    /**
     * Configure the SendReport service
     *
     * - API_Url (string) - URL to send the report, default our database.
     */
    'sendReport' => [
        'API_Url' => env('API_URL','http://localhost:8001/api/v1/'),
    ]
];