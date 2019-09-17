$(function () {
    $.ajax({
        url: baseUrl('login/auth'),
        method: 'POST',
        xhrFields: {
            withCredentials: true
        }
    })
});