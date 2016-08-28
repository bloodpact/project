<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Products;
use app\models\Orders;

/**
/**
* 
*/
class CheckoutController extends Controller{
	public function actionIndex()
	{
		4cart = Yii::$app->session->get('cart', []);
		$ids = array_keys($cart);
		$products = Products::findAll($ids);
		$model = new Orders();
		$total = 0;
		$text = "";
		foreach ($products as $product ) {
			$total +=$product->price*$cart[$product->id];
			$text .= $product->title . ":" . $product->id;
		}
		if ($model->load(Yii::$app->request->post()){
			$model ->total = $total;
			$model->products = $text;
			$model->save(;)

		}

		return $this->render("index", []);
	}
}