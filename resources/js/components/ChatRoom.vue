<template>
    <div>
        <div class="card shadow p-3">
            <div class="card-body topChat" ref="topChat">
                <ul>
                    <li
                        v-for="message in messages"
                        :key="message.id"
                        :class="{
                            'p-1': true,
                            'd-flex justify-content-end':
                                username.trim() ===
                                message.user_chat.username_userchat,
                            'd-flex justify-content-start':
                                username.trim() !==
                                message.user_chat.username_userchat,
                            'text-end':
                                username.trim() ===
                                message.user_chat.username_userchat,
                        }"
                    >
                        <div
                            :class="[
                                'widthChat',
                                username.trim() ===
                                message.user_chat.username_userchat
                                    ? 'sent'
                                    : 'received',
                            ]"
                        >
                            <span class="subTitle">
                                <template
                                    v-if="
                                        username.trim() !==
                                        message.user_chat.username_userchat
                                    "
                                >
                                    <small>{{
                                        message.user_chat.username_userchat
                                    }}</small>
                                    <br />
                                </template>
                                {{ message.message }}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer shadow">
                <div class="d-flex gap-3 bottomChat">
                    <input
                        class="form-control"
                        v-model="newMessage"
                        placeholder="Enter your message"
                    />
                    <button @click="sendMessage" class="btn btn-primary">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { io } from "socket.io-client";
import axios from "axios";

export default {
    props: ["roomId", "username"],
    data() {
        return {
            messages: [],
            newMessage: "",
            socket: null,
            api_url: "/api/messages",
        };
    },
    created() {
        this.socket = io("http://localhost:3000");
        this.joinRoom();
        this.socket.on("message", (message) => {
            this.messages.push(message);
            this.$nextTick(() => {
                this.scrollToBottom();
            });
        });
    },
    watch: {
        roomId(newRoomId, oldRoomId) {
            this.joinRoom();
        },
    },
    methods: {
        joinRoom() {
            this.socket.emit("joinRoom", this.roomId);
            this.fetchMessages();
        },
        fetchMessages() {
            axios
                .get(`${this.api_url}/${this.roomId}`)
                .then((response) => {
                    this.messages = response.data;
                    this.$nextTick(() => {
                        this.scrollToBottom();
                    });
                })
                .catch((error) => {
                    console.error("Error fetching messages:", error);
                });
        },
        sendMessage() {
            const message = {
                username: this.username,
                message: this.newMessage,
                room: this.roomId,
            };
            axios
                .post(`${this.api_url}/${this.roomId}/store`, message)
                .then((response) => {
                    const responseData = response.data;
                    this.socket.emit("chatMessage", responseData);
                    this.newMessage = "";
                    this.$nextTick(() => {
                        this.scrollToBottom();
                    });
                })
                .catch((error) => {
                    console.error("Error sending message:", error);
                });
        },
        scrollToBottom() {
            const topChat = this.$refs.topChat;
            if (topChat) {
                topChat.scrollTop = topChat.scrollHeight;
            }
        },
    },
};
</script>

<style scoped>
.topChat {
    height: 340px;
    overflow: auto;
    position: relative;
}
.bottomChat {
    position: relative;
    width: 100%;
}
.subTitle {
    font-size: 14px;
}
.widthChat {
    width: 70%;
    padding: 10px;
    color: #fff;
    position: relative;
    margin-bottom: 10px;
}
.widthChat.sent {
    background: #6b54ff;
    align-self: flex-end;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}
.widthChat.sent::after {
    content: "";
    position: absolute;
    top: 0;
    right: -6px;
    border-width: 6px 0 6px 6px;
    border-style: solid;
    border-color: transparent transparent transparent #6b54ff;
}
.widthChat.received {
    background: #e0e0e0;
    color: #000;
    align-self: flex-start;
    border-bottom-left-radius: 15px;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}
.widthChat.received::after {
    content: "";
    position: absolute;
    top: 0;
    left: -6px;
    border-width: 6px 6px 6px 0;
    border-style: solid;
    border-color: transparent #e0e0e0 transparent transparent;
}
</style>
