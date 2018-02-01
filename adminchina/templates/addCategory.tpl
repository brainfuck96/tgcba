<div class="row">
    <div class="col-md-7">
        <ul class="list-group" id="listCategory"  style="height: 80vh; overflow: auto;">

        </ul>
    </div>
    <div class="col-md-5">
        <form id="formCategory" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Новая категория</label>
                <input class="form-control" type="text" name="category" id="category" required>
            </div>
            <div class="form-group">
                <input class="btn btn-dark" type="submit" name="btnAdd" value="Добавить категорию">
            </div>
        </form>
    </div>
    <script src="./static/js/script.category.js" type="text/javascript"></script>
    <script>
        getCategories();
    </script>
</div>