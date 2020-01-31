<?php 
declare(strict_types=1);

require dirname(__DIR__).'/config/bootstrap.php';


$container 	= CNContainer::buildContainer(dirname(__DIR__).'\config'); 

$HTTPKernel = $container->get('http_kernel');
//dump($container->get('http_kernel'));die;
$request = $container->get('request');
$response = $container->get('response');

$response = $HTTPKernel->handle($request);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="background-color: black;color:#fff;padding:5px;border-radius: 5px;font-weight: 600px;text-align: center;font-size:16px;font-family: Arial;"><?php $response->send()?> to our Framework</div>
	
	
	
</body>
</html>

