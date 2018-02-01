function getCategories() {
    $.ajax({
        url: "php/Categories.php",
        dataType: "JSON",
        success: function(json){
            var ul = $('#listCategory');
            ul.empty();
            for(var i=0;i<json.length;i++){
                ul.append('<li class="list-group-item list-group-item-dark">\n' +
                    '    <a href="#" onclick="deleteCategories('+ json[i][0]+'); return false;"><i class="fas fa-minus"></i></a>\n' +
                    '    '+json[i][1]+'\n' +
                    '</li>');
            }
        }
    })
}

function deleteCategories(id) {
    $.ajax({
        url: "php/DeleteCategory.php",
        type: 'POST',
        data: {"id": id},
        success: function(){
            alert('Категория была удалена!');
            window.location = 'index.php?page=category'
        },
        error: function (data) {
            alert('Категорию удалить не удалось!');
            console.log(data);
        }
    })
}

$("#formCategory").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: './php/AddCategory.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            alert('Категория '+ data +' успешно добавлена! ');
            window.location = 'index.php?page=category'
        },
        error: function (data) {
            alert('Простите, что-то пошло не так, попробуйте еще раз!');
            console.log(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });
});