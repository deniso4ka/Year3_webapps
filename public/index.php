<?php
// autoloader& other setup
// ---------------------------------------
require_once __DIR__ . '/../app/setup.php';

//-------------------------------------------
// map routes to controller class/method
//-------------------------------------------
use Itb\Utility\ControllerUtility;


$app->get('/',          ControllerUtility::controller('Itb\Controller', 'main/index'));
$app->get('/list',      ControllerUtility::controller('Itb\Controller', 'main/list'));
$app->get('/show/{id}', ControllerUtility::controller('Itb\Controller', 'main/show'));
$app->get('/show',      ControllerUtility::controller('Itb\Controller', 'main/showMissingIsbn'));

/*

// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    $mainController = new \Itb\Controller\MainController();
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            return $mainController->error404($app, $message);

        default:
            $message = 'We are sorry, but something went terribly wrong.';
            return $mainController->error404($app, $message);
    }
});
*/
// go - process request and decide what to do
//---------------------------------------------
$app->run();

