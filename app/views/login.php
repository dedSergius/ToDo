<div class="container">
    <div class="hover row align-items-center">
        <div class="col-9"><h1>Вход</h1></div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="form-horizontal" role="form" method="post" action="<?= $this->makeUrl("login/login"); ?>">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="name" name="username" class="form-control" id="inputUsername"
                               placeholder="Имя пользователя">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="password" name="password" class="form-control" id="inputPassword"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="checkbox" for="checkbox2">
                            <input name="remember" type="checkbox" id="checkbox2" checked="checked"
                                   data-toggle="checkbox" class="custom-checkbox"><span class="icons"><span
                                        class="icon-unchecked"></span><span class="icon-checked"></span></span>
                            Запомнить меня
                        </label>
                    </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?= App\Utility\Token::generate(); ?>"/>
            </form>
                <div class="form-group">
                    <button class="btn btn-primary" onclick='$("form").submit()'>Войти</button>
                    <button class="btn btn-link" onclick="window.location.href = '/'">Вернуться на главную</button>
                </div>
        </div>
        <div class="col-6">
            <?php (new \App\Core\View())->getFile("template/feedback"); ?>
        </div>
    </div>
</div>