<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('aszinga:about', function () {
    $this->info('A.S ZINGA — site officiel');
})->purpose('Affiche l’identité de l’application.');
