<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Products;
/**
* 
*/
class CartController extends Controller
{
	public function actionIndex(){
		$cart = Yii::$app->session->get('cart', array());
		$ids = array_keys($cart);
		$products = Products::find()->where(array("id"=>$ids))->all();
		return $this->render;


	}
	public function actionAdd()
	{
		$id = Yii::$app->request->get("id", false);
		if(!$id){
			return json_encode([
				"status"=> "error"]);
		}
		$cart = Yii::$app->session->get('cart', array()); //что то с массивом
		if (array_key_exists($id, $cart)){
			$cart[$id]+=1;
		}else{
			$cart[$id]=1;
		}
		Yii::$app->session->set('cart', $cart);
		return json_encode([
			"status"=>"success"
			]);
	}
	public function actionRemove()
	{
		$id = Yii::$app->request->get("id", false);
		if (!$id){
			return json_encode([
				"status"=> "error"]);
		}
		$cart = Yii::$app->session->get('cart', array());
		if (isset($cart[$id])){
				if (!$id){
			return json_encode([
				"status"=> "error"]);
		}
		}
		unset($cart[$id]);
		Yii::$app->session->set('cart', $cart);
		return json_encode([
			"status"=>"success"
			]);
	}
}