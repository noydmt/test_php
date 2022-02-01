<?php
	namespace App\controller;

	// TestModel を読み込む
	use App\models\TestModel;

	class TestController {
		public function run() {
			$model = new TestModel();
			echo $model->getHelloWorld();
		}
	}
?>