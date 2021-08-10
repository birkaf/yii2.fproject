<?php
use \yii\helpers\Url;
?>
<div class="col-md-12">
    <h2>Cписок имеющихся авторов</h2>
    <a class="btn btn-default" href="<?= Url::to(['author/add']) ?>" role="button">
        Добавить автора
    </a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Количество книг</th>
            <th>Действия</th>
        </tr>
        </thead>
        <?php foreach ($authors as $author):  ?>
            <tr>
                <td><?= $author->fam ?></td>
                <td><?= $author->name ?></td>
                <td><?= $author->otch ?></td>
                <td>
                    <?php
                    echo count($author->book);
                    ?>

                </td>
                <td>
                    <a class="btn btn-info" href="<?= Url::to(['author/edit','id'=> $author->id]) ?>" role="button">
                        Редактировать автора
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить автора</button>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Удаление автора</h4>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить автора?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <a class="btn btn-danger" href="<?= Url::to(['author/delete','id'=> $author->id]) ?>" role="button">
                    Удалить автора
                </a>

            </div>
        </div>
    </div>
</div>