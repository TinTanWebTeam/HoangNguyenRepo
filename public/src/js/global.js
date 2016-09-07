function getContentByUrl(element){
    $.get(url + $(element).attr('data-url'), function(view) {
        $("div#page-wrapper").empty().append(view);
    });
    
}

