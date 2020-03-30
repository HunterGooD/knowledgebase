<?php
require_once '../web/template/header.php';
/*
 * Выводит список всех документов
 */
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once '../config/bootstrap.php';

$documentList = new \usecase\document\DocumentList("../web/index.html");
$catalog = $documentList->execute();
?>
<div class="ui container">
    <div class="two column row">
        <div class="text column grid centered">
            <h1>Список документов</h1>
            <form class="search ui icon input form" action="DocumentFind.php" method="post">
                <input type="text" name="keyWord" placeholder="Поиск по ключевому слову">
                <label for="search_button"><i class="circular search link icon"></i></label>
                <input type="submit" id="search_button">
            </form> 
            <div class="add_document">
                <button class='ui button'>Создать документ</button>
            </div>
        </div>

        <div class="ui list column">
            <?php
            foreach ($catalog->getDocuments() as $document):
                $document->createResources();
                ?>
                <div class="item">
                    <i class="folder open icon"></i>
                    <div class="content">
                        <div class="header">
                            Документ: <?= $document->getName() ?> 
                            <a>Редактировать</a><b>/</b><a>Удалить</a>
                        </div>
                        <div class="description">
                            <a href="<?= $document->getSource() ?>" target="__blank">Просмотреть документ</a>
                        </div>
                        <div class="list">
                            <?php
                            foreach ($document->getResources() as $resource) :
                                ?>
                                <div class="item">
                                    <i class="file icon"></i>
                                    <div class="content">
                                        <div class="header">Ресурс: <?= $resource->getTag() ?></div>
                                        <div class="description">
                                            <a target="__blank" href="<?= $document->getSource() . "#" . $resource->getTag() ?>">Посмотреть</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php
require_once "../web/template/footer.php";