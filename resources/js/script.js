import { socket } from "./node";        

$(function() {
    if (document.getElementById("chatContent")) {
        const sender_id = $("#sender_id").val();    
        const receiver_id = $("#receiver_id").val();
        const room = [sender_id, receiver_id].sort().join("_");
        socket.emit("join-room", { room });

        $("#chatForm").submit(function(event) {
            event.preventDefault();
            const message = $("#message").val();
            if(message.trim() === "") return;            
            
            createMessageEl(message);
            socket.emit("send-message", { message, room });            
        });

        socket.on("receive-message", ({ message }) => {
            createMessageEl(message, "friend");
        });
    }

    const createMessageEl = (message, type = "me") => {
        $("#message").val("");        
        let content = `<div class="d-flex justify-content-end">
                <p class="bg-primary text-light rounded p-2">
                    ${message}
                </p>
            </div>`;
        
        if(type !== "me") {
            content = `<div class="d-flex justify-content-start">
                <p class="bg-secondary text-light rounded p-2">
                    ${message}
                </p>
            </div>`; 
        }

        $("#chatContent").prepend(content);
    };

});