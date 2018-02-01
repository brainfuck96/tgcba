function deleteImg(path, id) {
    $.ajax({
        url: "php/DeleteImage.php",
        type: 'POST',
        data: {"path": path, "id": id},
        success: function(data){
            alert('Изображение было удалено!');
            $('li:contains("'+path+'")').remove();
        },
        error: function (data) {
            alert('Изображение удалить не удалось!');
            console.log(data);
        }
    })
}

function  deleteQuestion(id) {
    if (confirm("Перед удалением вопроса, удалите все изображения связанные с вопросом! " +
            "Их не удаление может вызвать страшные последствия! Вы их удалили?")) {
        $.ajax({
            url: "php/DeleteQuestion.php",
            type: 'POST',
            data: {"id": id},
            success: function(){
                alert('Вопрос был удален!');
                window.location = 'index.php?page=edit'
            },
            error: function (data) {
                alert('Вопрос удалить не удалось!');
                console.log(data);
            }
        });
    }
}


function getQuestions() {
    $.ajax({
        url: "php/Questions.php",
        dataType: "JSON",
        success: function(json){
            var div = $('#questions');
            div.empty();
            for(var i=0;i<json.length;i++){
                var item ='<div class="list-group-item list-group-item-dark"><a href="" onclick="deleteQuestion('+ json[i][0] +'); return false;"><i class="fas fa-minus"></i></a>' +
                    '<a href="" onclick="getQuestion(' + json[i][0] + ');return false;" >\n' +
                    json[i][1] +
                    '</a></div>';
                div.append(item);
            }
        }
    })
}

function getQuestion(id) {
    $.ajax({
        url: "php/Question.php",
        dataType: "JSON",
        data: {"id" : id},
        success: function(json){
            if ( json.length > 1 )
                return;
            $('#idQuestion').val(json[0][0]);
            $('#category').val(json[0][1]);
            $('#question').val(json[0][2]);
            $('#answer').val(json[0][3]);
            var ul = $("#fileList");
            ul.empty();
            if ( json[0][4] !== null) {
                var img = json[0][4].split(';');
                for (var i = 0; i < img.length; i++) {
                    if ( img[i] === '') continue;
                    ul.append('<li class="list-group-item">'
                        + '<a href="" onclick="deleteImg(\'' + img[i] + '\', '+ json[0][0] +'); return false;"><i class="fas fa-minus"></i></a>'
                        + '<a target="_blank" href="' + img[i].substr(1) + '">' + img[i] + '</a></li>');
                }
            }
        }
    })
}

$(document).ready(function(){
    $('#files').change(function(){
        var ul = $("#fileListNew");
        ul.empty();
        for(var i=0; i< this.files.length; i++){
            var file = this.files[i];
            var filename = file.name;
            ul.append('<li class="list-group-item">' + filename + '</li>');
        }
    });
});

$("#formEdit").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: './php/EditQuestion.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            alert('Вопрос успешно отредактирован! ' + data);
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