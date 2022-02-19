<?php

return [
    'name' => 'Inventaire',
    'providers' => [
        SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
    ],
    'aliases' => [
        'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,

    ]
];
