let user = {
    login: function() {
        let username = $("#username").val();
        let password = $("#password").val();

        let parameters = {
            username: username,
            password: password
        };


        $.post('/account/login', parameters, function(response) {
            if(response.success && response.redirectUrl) {
                window.location.href = response.redirectUrl;
            } else if(!response.success && response.msg) {
                alert(response.msg);
            }
        }, 'json');
    },
    logout: function() {
        $.post('/account/logout', {}, function(response) {
            console.log(response);
            if(response.success && response.redirectUrl) {
                window.location.href = response.redirectUrl;
            } else if(!response.success && response.msg) {
                alert(response.msg);
            }
        }, 'json');
    }
}
