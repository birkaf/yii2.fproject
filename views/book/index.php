<?php
use \yii\helpers\Url;
?>
<div class="col-md-12">
    <h2>Cписок имеющихся книг</h2>
    <a class="btn btn-default" href="<?= Url::to(['book/add']) ?>" role="button">
        Добавить книгу
    </a>
<?php

?>
<!--    --><?php ////$authors = $books->author ;
//    foreach ($books as $book){
//     echo'<pre>';
//        $str='';
//     foreach ($book->author as $author){
//         $str .= $author->fam . $author->name . $author->otch .', ';
//     }
//
//     echo $book->title . '  '. $book->page . ' Авторы:' .$str.'</br>' ;
//
//
//        echo'</pre>';
//    }

        //print_r($authors);
    //var_dump($items);
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название книги</th>
            <th>Количество страниц</th>
            <th>Авторы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <?php foreach ($books as $book):  ?>


            <tr>
                <td><?= $book->title ?></td>
                <td><?= $book->page ?></td>
                <td><?php
                    $author_str = '';
                    foreach ($book->author as $author){
                        $author_str .= $author->fam . ' ' . $author->name . ' ' . $author->otch .', ';
                    }
                    echo rtrim($author_str,', ');
                    ?>
                </td>
                <td>
                    <a class="btn btn-info" href="<?= Url::to(['book/edit','id'=> $book->id]) ?>" role="button">
                        Редактировать книгу
                    </a>
<!--                                        <button type="button" class="btn btn-primary" >Small modal</button>-->
<!---->
<!--                                      <a class="btn btn-danger" href="--><?//= Url::to(['book/delete','id'=> $book->id]) ?><!--" role="button">-->
<!--                                          Удалить автора-->
<!--                                        </a>-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить книгу</button>

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
                <h4 class="modal-title" id="myModalLabel">Удаление книги</h4>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить книгу?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <a class="btn btn-danger" href="<?= Url::to(['book/delete','id'=> $book->id]) ?>" role="button">
                    Удалить книгу
                </a>

            </div>
        </div>
    </div>
</div>