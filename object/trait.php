<?php
  trait ProductTrait {
    public function getProduct() {
      echo 'ProductTrait -> getProduct()';
    }
  }

  trait NewsTrait {
    public function getNews() {
      echo 'NewsTrait -> getNews()';
    }
  }

  class Product {
    use ProductTrait;
    use NewsTrait;

    public function getInfomation() {
      echo 'This is Product Class';
    }
  }

  $product = new Product();
  $product->getInfomation(); // This is Product Class
  echo '<br>';
  $product->getProduct(); // ProductTrait -> getProduct()
  echo '<br>';
  $product->getNews(); // NewsTrait -> getNews()
  echo '<br>';
?>