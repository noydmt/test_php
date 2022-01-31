<?php
  // インターフェース
  interface ProductInterface {
    public function echoProduct();

    public function getProduct();
  }
  
  // インターフェース
  interface NewsInterface {
    public function echoNews();

    public function getNews();
  }

  //  抽象クラス
  abstract class ProductAbstruct {
    public function echoProduct() {
      echo '親クラスです。';
    }

    // 具象クラスに対して実装を強制する
    abstract public function getProduct();
  }

  // 親クラス
  class BaseProduct extends ProductAbstruct {
    public function echoProduct() {
      echo '親クラスです。';
    }

    public function getProduct() {

    }
  }

  class impleClass implements ProductInterface, NewsInterface {
    public function echoProduct() {
      echo 'impleClass::echoProduct';
    }

    public function getProduct() {
      echo 'impleClass::getProduct';
    }

    public function echoNews(){
      echo 'impleClass::echoNews';
    }

    public function getNews(){
      echo 'impleClass::getNews';
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

    public function echoProduct() {
      echo '子クラスから呼び出し';
      echo Parent::echoProduct();
    }
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

  echo '<br>';
  $implClass = new impleClass();
  $implClass->echoNews(); // impleClass::echoNews
?>