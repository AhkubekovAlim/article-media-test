$(function(){
    $('.users-list__export-xml').on('click', function(event){
        event.preventDefault;
        var $button = $(this),
            url = $button.attr("data-href");
        $.ajax({
            url: url,
            method: "GET",
            success: function(data, status, xhr) {
                var filePath = JSON.parse(data)['filePath'];
                var link = document.createElement('a');
                link.href = filePath;
                link.download = filePath.split('/').pop();
                document.body.appendChild(link);
                link.click();
                setTimeout(function() {
                    document.body.removeChild(link);
                }, 0);
            }
        });
    });

});