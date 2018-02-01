$("#formAdd").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: './php/AddQuestion.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            $('#formAdd')[0].reset();
            $("#fileList").empty();
            $("#question").val('');
            alert('Вопрос успешно добавлен! ' + data);
            window.location = 'index.php?page=add'
        },
        error: function () {
            alert('Простите, что-то пошло не так, попробуйте еще раз!');
            console.log();
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).ready(function(){
    $('#files').change(function(){
        var ul = $("#fileList");
        ul.empty();
        for(var i=0; i< this.files.length; i++){
            var file = this.files[i];
            var filename = file.name;
            ul.append('<li class="list-group-item">' + filename + '</li>');
        }
    });
});