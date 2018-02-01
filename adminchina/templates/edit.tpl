<div class="row">
    <div class="col-md-7">
        <form id="formEdit" enctype="multipart/form-data">
            <label for="category">Категория вопроса:</label>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <select class="form-control" name="category" id="category"></select>
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
                <textarea class="form-control" name="question" id="question" style="height: 15vh;"></textarea>
            </div>
            <div class="form-group">
                <label for="answer">Ответ: </label>
                <textarea class="form-control" name="answer" id="answer" style="height: 20vh;"></textarea>
            </div>
            <div class="form-group">
                <label for="files">Изображения: </label>
                <input class="form-control" id="files" name="files[]" type="file" multiple>
                <ul class="list-group" id="fileList">

                </ul>
                <ul class="list-group" id="fileListNew">

                </ul>
            </div>
            <div class="form-group" hidden>
                <input class="form-control" id="idQuestion" name="idQuestion" type="number">
            </div>
            <div class="form-group">
                <input class="btn btn-dark" type="submit" name="btnAdd" value="Редактировать вопрос">
            </div>
        </form>
        <script src="./static/js/script.edit.js" type="text/javascript"></script>
    </div>
    <div class="col-md-5" align="justify">
        <div id="questions" class="list-group" style="overflow: auto; height: 85vh;">


        </div>
        <script>
            getQuestions()
        </script>
    </div>
</div>