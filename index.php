<?php

/*
Copyright 2016 Daniil Gentili
(https://daniil.it)

This file is part of the PWRTelegram API.
the PWRTelegram API is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
The PWRTelegram API is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU Affero General Public License for more details.
You should have received a copy of the GNU General Public License along with the PWRTelegram API.
If not, see <http://www.gnu.org/licenses/>.
*/
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/php-error-index.log');
set_time_limit(0);
ignore_user_abort(1);
require_once 'src/PWRTelegram/PWRTelegram/Tools.php';
require_once 'src/PWRTelegram/PWRTelegram/API.php';
require_once 'src/PWRTelegram/PWRTelegram/Proxy.php';
require_once 'src/PWRTelegram/PWRTelegram/Main.php';
require_once '../storage_url.php';
require_once '../db_connect.php';

$pwrhomedir = realpath(__DIR__);

$API = new \PWRTelegram\PWRTelegram\Main($GLOBALS);
try {
    $API->run();
} catch (Exception $e) {
    $API->jsonexit(['ok' => false, 'error_code' => 400, $e->getTraceAsString()]);
}
