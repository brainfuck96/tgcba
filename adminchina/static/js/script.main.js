function getCategories() {
    $.ajax({
        url: "php/Categories.php",
        dataType: "JSON",
        success: function(json){
            var select = $('#category');
            select.empty();
            for(var i=0;i<json.length;i++){
                select.append($('<option>', { value : json[i][0] }).text(json[i][1]));
            }
        }
    })
}




