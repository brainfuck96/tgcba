function deleteNonAnswered(id) {
    $.ajax({
        url: "php/DeleteNonAnswered.php",
        type: 'POST',
        data: {"id": id},
        success: function(){
            alert('Неотвеченный вопрос был удален!');
            window.location = 'index.php?page=nanswered'
        },
        error: function (data) {
            alert('Неотвеченный вопрос удалить не удалось!');
            console.log(data);
        }
    })
}