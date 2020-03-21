<div class="container">
    <div class="hover row align-items-center">
        <div class="col-9"><h1>Задачи</h1></div>
        <div class="col-3">
            <button class="btn btn-primary" onclick="window.location.href = '<?= $this->makeUrl("add"); ?>'">Добавить задачу</button>
            <?php if(empty($this->user)){ ?>
            <button class="btn btn-link" onclick="window.location.href = '<?= $this->makeUrl("login"); ?>'">Войти</button>
            <?php } ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col sort d-flex align-items-center">
            <select class="form-control select select-default select-sm mrs sort-select" data-toggle="select">
                <?php $select_options = [
                        "id" => "Без сортировки",
                        "username" => "Имя пользователя",
                        "email" => "Email",
                        "status" => "Статус"
                ];

                foreach ($select_options as $option => $value) { ?>
                <option value="<?= $option ?>" <?= ($option == $this->sf ? "selected" : "") ?>><?= $value ?></option>
                <?php } ?>
            </select>
            <button class="btn btn-default sort-btn">
                <?php if($this->sd == "ASC") { ?>
                <i class="fas fa-sort-down"></i>
                <?php } else { ?>
                <i class="fas fa-sort-up"></i>
                <?php } ?>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <?php if(count($this->tasks) == 0) { ?>
            <div class="media empty">
                <div class="media-header">
                    <i class="fas fa-sad-tear"></i>
                </div>
                   <div class="media-body">
                       <h6>Кажется, тут нет задач...</h6>
                       <p>Добавьте задачу с помощью кнопки в правом верхнем углу.</p>
                   </div>
            </div>
            <?php } ?>
            <?php foreach ($this->tasks as $task) { ?>
                <div class="media task">
                    <div class="status">
                        <?php if ($task->status == 1) { ?>
                            <i class="fas fa-check-circle green pb-1" title="Завершена"></i>
                        <?php } else { ?>
                            <i class="far fa-circle pb-1"></i>
                        <?php } ?>
                        <?php if ($task->edited == 1) { ?>
                            <i class="fas fa-exclamation-circle red" title="Изменено администратором"></i>
                        <?php } ?>
                    </div>
                    <div class="media-body">
                        <div class="media-header">
                            <strong><?= $task->username ?></strong><br><small><?= $task->email ?></small>
                        </div>
                        <div class="media-content">
                            <p><?= $task->text ?></p>
                        </div>
                    </div>
                    <?php if(!empty($this->user)){ ?>
                        <?php if($task->status != 1){ ?>
                            <button class="btn btn-primary check" data-id="<?= $task->id ?>" title="Отметить выполненным"><i class="fas fa-check"></i></button>
                        <?php } ?>
                        <button class="btn btn-primary" onclick="window.location.href = '<?= $this->makeUrl("edit?id=".$task->id); ?>'" title="Редактировать"><i class="fas fa-pen"></i></button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php if(!empty($this->user)){ ?>
        <div class="col-2">
            <div class="tile">
                <h3 class="tile-title mb-3"><?= $this->user->username ?></h3>
                <a class="btn btn-primary btn-large btn-block" href="<?= $this->makeUrl("logout"); ?>">Выйти</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php if ($this->pages_count > 1) { ?>
        <div class="row mt-3">
            <ul class="pagination-plain">
                <?php if ($this->page_number != 1) { ?>
                    <li class="previous">
                        <a href="<?= $this->makeUrl("?pn=" . ($this->page_number - 1)); ?>">Назад</a>
                    </li>
                <?php } ?>
                <?php for ($i = 0; $i < $this->pages_count; $i++) { ?>
                    <li class="<?= (($i + 1) == $this->page_number) ? "active" : "" ?>">
                        <a href="<?= $this->makeUrl("?pn=" . ($i + 1)); ?>"><?= $i + 1 ?></a>
                    </li>
                <?php } ?>
                <?php if ($this->page_number < $this->pages_count) { ?>
                    <li class="next">
                        <a href="<?= $this->makeUrl("?pn=" . ($this->page_number + 1)); ?>">Вперед</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

</div>