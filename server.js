import express from "express";
import { createServer } from "http";
import { Server } from "socket.io";

const app = express();
const server = createServer(app);
const port = process.env.PORT || 3000;
const io = new Server(server, {
    cors: {
        origin: "*",
    }
});

app.get("/", (req, res) => {
    res.send(`<p>NodeJS running smoothly...</p>`);
});

io.on("connection", (socket) => {
    socket.on("join-room", ({ room }) => {
        socket.join(room);        
    });

    socket.on("send-message", ({ message, room }) => {
        socket.to(room).emit("receive-message", { message });        
    });
});


server.listen(port, () => console.log(`NodeJS running on port: ${port}`));