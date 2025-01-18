function sendMessage() {
    var messageInput = document.getElementById("message-input");
    var chatBox = document.getElementById("chat-box");

    if (messageInput.value.trim() !== "") {
        var message = "<p>User 1: " + messageInput.value + "</p>";
        chatBox.innerHTML += message;
        messageInput.value = "";
    }
}

function sendFile() {
    var fileInput = document.getElementById("file-input");
    var chatBox = document.getElementById("chat-box");

    var file = fileInput.files[0];
    if (file) {
        var message = "<p>User 2 sent a file: <a href='" + URL.createObjectURL(file) + "' target='_blank'>Download PDF</a></p>";
        chatBox.innerHTML += message;
        fileInput.value = ""; // clear file input
    }
}