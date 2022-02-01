<?php

	namespace App\models; // 名前空間

	class TestModel {
		private $test = 'Hello World';

		public function getHelloWorld() {
			return $this->test;
		}
	}
?>