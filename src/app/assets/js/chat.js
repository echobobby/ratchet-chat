/**
 * Created by Bob on 9/9/15.
 */
var username = $("#username");
var message = $("#message");

$("#form-login").submit(function(event){

    event.preventDefault();

    if(username.val() != ""){
        conn.send(JSON.stringify({
            user: username.val()
        }));

        $(".login-wrap").hide();
    }

    render_user(username.val());
});

$("#form-message").submit(function(e){

    e.preventDefault();

    if(message.val() == ""){
        return false;
    }

    conn.send(JSON.stringify({
        "type" : "message",
        "message" : message.val()
    }));

    render_message(message.val());

    message.val("");
});

var render_message = function(val){
    $(".chat-display").append($("<div class = 'chat-content'/>").html(val));
}

var render_user = function(val){
    $(".user ul").append('<li class="list-group-item"><i class="fa fa-fw fa-circle"></i><span class="badge"></span>' + val + '</li>');
}
