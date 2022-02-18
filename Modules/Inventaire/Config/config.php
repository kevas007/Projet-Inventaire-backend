<?php

return [
    'name' => 'Inventaire',
    'providers' => [
        SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
        Barryvdh\Snappy\ServiceProvider::class,
    ],
    'aliases' => [
        'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
        'PDF' => Barryvdh\Snappy\Facades\SnappyPdf::class,
        'SnappyImage' => Barryvdh\Snappy\Facades\SnappyImage::class,
    ]
];
