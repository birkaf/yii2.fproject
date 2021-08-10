<?php use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;

foreach($book->author as $author)
    $row_selected[]=$author->id - 1;
$bookauthor->id_author = $row_selected;
foreach($authors as $author)
    $row[]=$author;
?>
<div class="col-md-12">
    <h2><?= $this->title ?></h2>

    <?php $form = ActiveForm::begin([
        'id'=> 'add-book-form',
        'options' => [
            'class' => 'form-horizontal',
        ],
        'fieldConfig' => [
            'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ],
    ]) ?>
    <?= $form->field($book, 'title') ?>
    <?= $form->field($book, 'page') ?>
    <?php
    echo $form->field($bookauthor, 'id_author')->widget(Select2::classname(), [
        'data' => $row,
        'options' => ['placeholder' => 'Выберите автора'],
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
            'multiple' => true
        ],
    ])->label('Автор(ы) книги');
    ?>
    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>