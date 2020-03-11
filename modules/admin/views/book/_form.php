<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
s
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	<?= $form->field($model, 'authors')
	->dropDownList($author->getAuthorsArray(),
	[
	'multiple'=>'multiple',
	'required' => 'required'
	]
	)->label("Add Authors"); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
