<div class="container">
    <div class="hover row align-items-center">
        <div class="col-9"><h1>Новая задача</h1></div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="form-horizontal" role="form" method="post" action="<?= $this->makeUrl("add/create"); ?>">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="name" name="username" class="form-control" id="inputUsername"
                               placeholder="Имя пользователя">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="email" name="email" class="form-control" id="inputEmail"
                               placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea name="text" class="form-control comment" placeholder="Текст задачи..." style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 64px;"></textarea>
                    </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?= App\Utility\Token::generate(); ?>"/>
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