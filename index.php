<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

function set__log($val, $file = '') {
    if (!$file) {
        $file = 'logs/log_' . date('Ymd') . '.log';
    }
    $fp = fopen($file, "a+");
    fwrite($fp, date("Y-m-d H:i:s") . "\n");
    ob_start();
    var_dump($val);
    fwrite($fp, ob_get_contents() . "\n");
    ob_end_clean();
    fclose($fp);
}

function ww($val) {
    echo '<pre>';
    print_r($val);
    exit();
}

function wwww($val) {
    set__log($val);
}

function www($val) {
    echo '<pre>';
    var_dump($val);
}

function w($val) {
    error_log(var_dump($val, 1));
    exit();
}
date_default_timezone_set("Asia/Shanghai");
use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

$autoloader = require_once 'autoload.php';

$kernel = new DrupalKernel('prod', $autoloader);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
