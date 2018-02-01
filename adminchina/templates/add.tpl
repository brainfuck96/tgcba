<div class="row">
    <div class="col-md-9">
        <form id="formAdd" enctype="multipart/form-data">
            <label for="category">Категория вопроса:</label>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <select class="form-control" name="category" id="category" required></select>
                        <script type="text/javascript">
                            getCategories();
                        </script>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="./index.php?page=category" class="btn btn-dark form-control">
                        <i class="fas fa-plus"></i> Категорию
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label for="question">Вопрос: </label>
                <textarea class="form-control" name="question" id="question" style="height: 15vh;" required>[@add-question]</textarea>
            </div>
            <div class="form-group">
                <label for="answer">Ответ: </label>
                <textarea class="form-control" name="answer" id="answer" style="height: 20vh;" required></textarea>
            </div>
            <div class="form-group">
                <label for="files">Изображения: </label>
                <input class="form-control" id="files" name="files[]" type="file" multiple>
                <ul class="list-group" id="fileList">

                </ul>
            </div>
            <div class="form-group" hidden>
                <input class="form-control" id="idDelete" name="idDelete" type="number" value="[@add-delete-id]">
            </div>
            <div class="form-group">
                <input class="btn btn-dark" type="submit" name="btnAdd" value="Добавить вопрос">
            </div>
        </form>
        <script src="./static/js/script.add.js" type="text/javascript"></script>
    </div>
    <div class="col-md-3" align="justify">
        <p>
            Данная админ панель предназначена для добавления новых вопросов и ответов на них
            к телеграм боту. Для <b>добавления вопроса</b> необходимо выбрать <b>категорию вопроса</b>, в случае,
            если подходящей категории нет, её можно добавить самостоятельно. Нажав кнопку "Добавить категорию".
            После этого, нужно описать тело вопроса в текстовом поле <b>"Вопрос"</b>. Затем нужно описать
            <b>"Ответ"</b>. В поле ответа можно добавить  <b>изображение</b>. Изображение добавляется
            при помощи  <b>шаблона</b>. Описание шаблона происходит в следующем формате
            <b>[[[название изображения]]]</b>. После этого необходимо прикрепить группу изображения и нажать кнопку
            <b>"Добавить"</b>.
        </p>
    </div>
</div>