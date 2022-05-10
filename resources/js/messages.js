import {createApp} from "vue";
import Messenger from "./components/Messenger";
import ChatList from "./components/ChatList";
import moment from "moment";

const chat_app = createApp({
    data() {
        return {
            conversation: null,
            messages: [],
            auth_user: null,
            user_id: user_id,
            csrf_token: csrf_token,
        }
    },
    methods: {
        moment(time) {
            return moment(time);
        },
    }
})
    .component('Messenger', Messenger)
    .component('ChatList', ChatList)
    .mount('#chat-app')
