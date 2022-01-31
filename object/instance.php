<?php
  class BaseProduct {
    final public function echoProduct() {
      echo '親クラスです。';
    }
  }

  class Product extends BaseProduct {
    private $product = [];

    // コンストラクター
    function __construct($product) {
      $this->product = $product;
    }

    // 値取得
    public function getProduct() {
      echo $this->product;
    }

    // productに追加
    public function addProduct($item) {
      $this->product .= $item;
    }

    // static メソッド
    public static function getStaticProduct($str) {
      echo $str;
    }

    // public function echoProduct() {
    //   echo '子クラスです'; // Cannot override final method BaseProduct::echoProduct()
    // }
  }

  $instance = new Product('テスト');

  $instance->getProduct(); // テスト
  echo '<br>';

  $instance->addProduct('追加分');
  $instance->getProduct(); // テスト追加分
  echo '<br>';

  $instance->echoProduct(); // 親クラスです。
  echo '<br>';

  Product::getStaticProduct('静的メソッド'); // 静的メソッド
?>