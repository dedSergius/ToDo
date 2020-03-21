<div class="container">
    <div class="hover row align-items-center">
        <div class="col-9"><h1>Редактировать задачу</h1></div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="form-horizontal" role="form" method="post" action="<?= $this->makeUrl("edit/edit"); ?>">
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea name="text" class="form-control comment" placeholder="Текст задачи..."
                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 64px;"><?= $this->task[0]->text ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?= App\Utility\Token::generate(); ?>"/>
                <input type="hidden" name="id" value="<?= $this->task[0]->id ?>"/>
            </form>
            <div class="form-group">
                <button class="btn btn-primary" onclick='$("form").submit()'>Сохранить</button>
                <button class="btn btn-link" onclick="window.location.href = '/';">Отмена</button>
            </div>
        </div>
        <div class="col-6">
            <?php (new \App\Core\View())->getFile("template/feedback"); ?>
        </div>
    </div>
</div>