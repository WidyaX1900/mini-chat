import { socket } from "./node";        

$(function() {
    if (document.getElementById("chatContent")) {
        const sender_id = $("#sender_id").val();    
        const receiver_id = $("#receiver_id").val();
        const room = [sender_id, receiver_id].sort().join("_");
        socket.emit("join-room", { room });

        const createMessageEl = (message, type = "me") => {
            $("#message").val("");
            let content = `<div class="d-flex justify-content-end">
                <p class="bg-primary text-light rounded p-2">
                    ${message}
                </p>
            </div>`;

            if (type !== "me") {
                content = `<div class="d-flex justify-content-start">
                <p class="bg-secondary text-light rounded p-2">
                    ${message}
                </p>
            </div>`;
            }

            $("#chatContent").prepend(content);
        };

        const ajaxSendChat = (data) => {
            $.ajax({
                url: "/chatting/send",
                type: "post",
                data: data,
                dataType: "json",
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log("Error fetching data: ", error);
                },
            });
        }

        const ajaxGetMessages = (sender_id, receiver_id) => {
            $.ajax({
                url: "/chatting/get_messages",
                type: "get",
                data: { sender_id, receiver_id },
                dataType: "html",
                success: function (response) {
                    if ($("#chatLoading").length > 0) {
                        $("#chatLoading").remove();
                    }

                    $("#chatContent").html(response);
                },

                error: function (error) {
                    console.log("Error fetching data: ", error);
                },
            });
        }

        $("#chatForm").submit(function(event) {
            event.preventDefault();
            const message = $("#message").val();
            if(message.trim() === "") return;            
            
            socket.emit("send-message", { message, room });            
            
            ajaxSendChat(new FormData($(this)[0]));                        
            createMessageEl(message);            
        });

        socket.on("receive-message", ({ message }) => {
            createMessageEl(message, "friend");
        });

        ajaxGetMessages(sender_id, receiver_id);
    }

});