const chatHelper = {
    ajaxGetMessages: (sender_id, receiver_id) => {
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
    },

    createMessageEl: (message, type) => {
        let content;
        
        $("#message").val("");
        if (type === "me") {
            content = `<div class="d-flex justify-content-end">
                <p class="bg-primary text-light rounded p-2">
                    ${message}
                </p>
            </div>`;
        } else {
            content = `<div class="d-flex justify-content-start">
                <p class="bg-secondary text-light rounded p-2">
                    ${message}
                </p>
            </div>`;
        }

        $("#chatContent").prepend(content);
    },

    ajaxSendMessage: (data) => {
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
};

export { chatHelper };