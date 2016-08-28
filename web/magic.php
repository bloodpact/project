<?php 
/**
* 
*/
class Magic  
{
	public $attributes = array();
	public function __set($name, $value){
		var_dump($name, $value);
	}
	public function __get($name){
		var_dump($name);
	}
}
$magic = new Magic();
$magic->title = "test";
var_dump($magic->title);