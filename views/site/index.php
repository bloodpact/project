<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<ul>
<?php foreach ($cat as $category ){
	
		echo $category->title;
		
	
}?>
</ul>
<?php foreach ($prod as $key) :?>
    <?= $key->title; ?><br>
    
    <img src= "/upload/<?= $key->image; ?>">
    <a href="javascript:{}" data-id="<?= $key->id ?>" class="add-to-cart">add to cart</a>
     <hr>

<?php endforeach ?>
</div>