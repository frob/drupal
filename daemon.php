<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

$autoloader = require_once 'autoload.php';

$kernel = new DrupalKernel('prod', $autoloader);

// All this kernal stuff needs to be rethought for use as a non-http service.
//$request = Request::createFromGlobals();
//$response = $kernel->handle($request);
//$response->send();
//
//$kernel->terminate($request, $response);

// Main loop delay initializer.
$respons_delay = 2;
$timeout = 10 * (10000 / $respons_delay);
$cycle_count = 0;
$running = true;

while ($running) {
  $cycle_count ++;
  echo "Running at: " . time(). "\n";

  if ($cycle_count >= $timeout) {
    $running = false;
    // We will still want a way to exit smoothly, but the a new kernel will be
    // necessary for that to happen.
//    $kernel->terminate($request, $response);
  }
  usleep($respons_delay);
}
