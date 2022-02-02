<?php
	// オートローダー読み込み
	require_once __DIR__ . '/vendor/autoload.php';

	use App\controller\TestController;

	$app = new TestController();
	$app->run();

	use Carbon\Carbon;
	echo '<br>';
	echo Carbon::now();
?>