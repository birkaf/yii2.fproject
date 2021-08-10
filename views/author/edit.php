<?php use yii\widgets\ActiveForm;
      use yii\helpers\Html;
?>
<div class="col-md-12">
    <h2><?= $this->title ?></h2>

    <?php $form = ActiveForm::begin([
            'id'=> 'add-author-form',
            'options' => [
                'class' => 'form-horizontal',
            ],
            'fieldConfig' => [
                'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
                'labelOptions' => ['class' => 'col-md-2 control-label'],
            ],
    ]) ?>
    <?= $form->field($author, 'fam') ?>
    <?= $form->field($author, 'name') ?>
    <?= $form->field($author, 'otch') ?>
    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>