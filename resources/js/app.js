import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';

import UsernameForm from './components/UsernameForm.vue';
import ChatRooms from './components/ChatRooms.vue';
import ChatRoom from './components/ChatRoom.vue';

const app = createApp({
    data() {
        return {
            username: '',
            roomId: null
        }
    },
    methods: {
        handleUsernameSubmitted(username) {
            this.username = username;
        },
        handleRoomJoined(roomId) {
            this.roomId = roomId;
        }
    },
    template: `
      <div>
        <UsernameForm v-if="!username" @username-submitted="handleUsernameSubmitted" />
        <ChatRooms v-else="!roomId" :username="username" @room-joined="handleRoomJoined" />
      </div>
    `
});

app.component('UsernameForm', UsernameForm);
app.component('ChatRooms', ChatRooms);

app.mount('#app');
window.Alpine = Alpine;
Alpine.start();
