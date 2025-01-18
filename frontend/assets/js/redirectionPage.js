function redirectionPage(url){
    window.onload = function() {
        setTimeout(function() {
            window.location.href = url;
        }, 1);
    };
}