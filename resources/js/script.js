import { socket } from "./node";
import { chatHelper } from "./helpers/chat_helper";        

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
            
            socket.emit("send-message", { message, room });     
            
            chatHelper.ajaxSendMessage(new FormData($(this)[0]));                        
            chatHelper.createMessageEl(message, "me");            
        });

        socket.on("receive-message", ({ message }) => {
            chatHelper.createMessageEl(message, "friend");
        });
        
        chatHelper.ajaxGetMessages(sender_id, receiver_id);
    }

});