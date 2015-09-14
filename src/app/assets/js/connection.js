/**
 * Created by Bob on 9/9/15.
 */
var conn = new WebSocket('ws://localhost:8080');

conn.open = function(e){
    console.log("Connection established!");
}

conn.onmessage = function(e) {
    render_message(e.data);
}
