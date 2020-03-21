<div class="footer">
    <div class="row">
        <a href="https://github.com/lukinysega/todo" target="_blank" title="Проект на Github"><i class="fab fa-github"></i></a>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Bootstrap 4 requires Popper.js -->
<script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ru.min.js"></script>

<script src="https://designmodo.github.io/Flat-UI/dist/scripts/flat-ui.js"></script>
<script>
    $('[data-toggle="select"]').select2();

    $(".sort-select").on('change', function (event) {
        event.preventDefault();
        $.ajax({
            url: '<?= $this->makeUrl("sort"); ?>',
            data: {sf: this.value},
        })
            .done(function () {
                document.location.reload();
            });

    });
    $(".sort-btn").on('click', function () {
        $.ajax({
            url: '<?= $this->makeUrl("sort"); ?>',
            data: {sd: "<?= ($this->sd == "ASC") ? "DESC" : "ASC" ?>"},
        })
            .done(function () {
                document.location.reload();
            });
    });

    $(".check").on('click', function () {
        $.ajax({
            url: '<?= $this->makeUrl("edit/check"); ?>',
            method : "POST",
            data: {id: this.getAttribute("data-id")},
        })
            .done(function () {
                document.location.reload();
            });
    });
</script>
</body>

</html>