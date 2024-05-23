<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="d-flex">
                <input
                    class="form-control p-2"
                    v-model="newRoom"
                    placeholder="Masukan ruangan baru..."
                    :class="{
                        'form-control': true,
                        'border border-danger': newRoomError,
                    }"
                    @input="newRoomError = false"
                />
                <button @click="createRoom" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <small v-if="newRoomError" class="text-danger"
                >Nama ruangan tidak boleh kosong</small
            >
            <ul class="list-group listScroll">
                <li
                    :class="{
                        listpointer: true,
                        'list-group-item d-flex align-items-center': true,
                        'bg-primary text-white': room.id === currentRoomId,
                    }"
                    v-for="room in chatRooms"
                    :key="room.id"
                    @click="joinRoom(room.id)"
                >
                    <div class="d-flex flex-column">
                        <strong>{{ room.name_chatroom }}</strong>
                        <template v-if="hasMessages(room)">
                            <small>
                                {{ getLastMessageUser(room) }}:
                                {{ truncateText(getLastMessageText(room), 20) }}
                            </small>
                        </template>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-8">
            <section id="content-chat">
                <div v-if="!currentRoomId" class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="title">Hello {{ username }}</h1>
                        <p class="mt-2 subTitle">
                            Selamat datang di laman Chat Application. Kamu bisa
                            mengoborol dengan ruangan yang tersedia di sebelah
                            kiri ada list item, kemudian kamu dapat click
                            ruangan tersebut, dan dapat mengobrol didalam
                            ruangan tersebut.
                        </p>
                        <p class="mt-2 subTitle">
                            Namun, apabila ingin membuat ruangan sendiri, bisa
                            dengan cara, masukan input field ruangan baru,
                            kemudia klik button (+)
                        </p>
                    </div>
                </div>
                <ChatRoom v-else :roomId="currentRoomId" :username="username" />
            </section>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { io } from "socket.io-client";
import ChatRoom from "./ChatRoom.vue";

export default {
    props: ["roomId", "username"],
    data() {
        return {
            chatRooms: [],
            newRoom: "",
            newRoomError: false,
            socket: null,
            api_url: "/api/chat-rooms",
            currentRoomId: null,
        };
    },
    components: {
        ChatRoom,
    },
    created() {
        this.fetchChatRooms();
        this.socket = io("http://localhost:3000");
        this.socket.on("newRoom", (room) => {
            this.chatRooms.push(room);
        });
    },
    methods: {
        fetchChatRooms() {
            axios.get(this.api_url).then((response) => {
                this.chatRooms = response.data;
                console.log("response data", response.data);
            });
        },
        createRoom() {
            this.newRoomError = false;
            if (!this.newRoom.trim()) {
                this.newRoomError = true;
                return;
            }

            axios
                .post(`${this.api_url}/store`, { name: this.newRoom })
                .then((response) => {
                    this.newRoom = "";
                    this.socket.emit("newRoom", response.data);
                });
        },
        joinRoom(roomId) {
            this.currentRoomId = roomId;
        },
        getLastMessage(room) {
            if (room.message && room.message.length > 0) {
                return room.message[0].message;
            }
            return "";
        },
        hasMessages(room) {
            return room.message && room.message.length > 0;
        },
        getLastMessage(room) {
            return room.message[0];
        },
        getLastMessageUser(room) {
            return this.getLastMessage(room).user_chat.username_userchat;
        },
        getLastMessageText(room) {
            return this.getLastMessage(room).message;
        },
        truncateText(text, length) {
            const maxLength = length;
            if (text.length <= maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength) + "...";
            }
        },
    },
};
</script>

<style scoped>
.listScroll {
    height: 400px;
    overflow-y: scroll;
}
.listpointer {
    padding: 20px 10px;
    cursor: pointer;
}
.title {
    font-size: 20px;
}
.subTitle {
    font-size: 14px;
}
</style>
