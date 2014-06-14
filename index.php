<?php 
	
	require 'vendor/autoload.php';
	
	$app = new \Slim\Slim(array(
    'debug' => true
	));
	
	$app->get('/hello/:name', function ($name) {
		echo "Hello, $name";
	});
	
	$app->get('/login', function() use ($app){
		
		$app->render('html/login.html');
	});
	
	$app->post('/login', function(){
		require_once "php/login.php";
	});
$app->run();

?>