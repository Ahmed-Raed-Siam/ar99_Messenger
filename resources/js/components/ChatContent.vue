<template>
    <!-- Chat: Content -->
    <div class="chat-body hide-scrollbar flex-1 h-100">
        <div class="chat-body-inner">
            <div v-for="message in this.$root.messages" v-bind:key="message.id" class="py-6 py-lg-12" id="chat-body">

                <!-- Message -->
                <div class="message"
                     :class="{'message-out' : message.user_id == $root.user_id}">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile"
                       class="avatar avatar-responsive">
                                    <span v-if="message.user.avatar_url === null"
                                          class="avatar-text avatar-lg">{{
                                            (message.user.name.substring(0, 1)).toUpperCase()
                                        }}</span>
                        <img v-else class="avatar-img"
                             :src="'uploads'+'/'+message.user.avatar_url"
                             alt="">
                    </a>

                    <div class="message-inner">
                        <div class="message-body">
                            <div class="message-content">
                                <div class="message-text">
                                    <p>{{ message.body }}</p>
                                </div>

                                <!-- Dropdown -->
                                <div class="message-action">
                                    <div class="dropdown">
                                        <a class="icon text-muted" href="#" role="button"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center"
                                                   href="#">
                                                    <span class="me-auto">Edit</span>
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             width="24"
                                                             height="24" viewBox="0 0 24 24"
                                                             fill="none"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-edit-3">
                                                            <path d="M12 20h9"></path>
                                                            <path
                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center"
                                                   href="#">
                                                    <span class="me-auto">Reply</span>
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             width="24"
                                                             height="24" viewBox="0 0 24 24"
                                                             fill="none"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-corner-up-left">
                                                            <polyline
                                                                points="9 14 4 9 9 4"></polyline>
                                                            <path
                                                                d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center text-danger"
                                                   href="#">
                                                    <span class="me-auto">Delete</span>
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             width="24"
                                                             height="24" viewBox="0 0 24 24"
                                                             fill="none"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-trash-2">
                                                            <polyline
                                                                points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10"
                                                                  y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                  y2="17"></line>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="message-footer">
                                        <span class="extra-small text-muted">{{
                                                $root.moment(message.created_at).fromNow()
                                            }}</span>
                        </div>

                    </div>
                </div>

                <!--Divider-->
                <div class="message-divider">
                    <small class="text-muted">Monday, Sep 16</small>
                </div>

            </div>
        </div>
    </div>
    <!-- Chat: Content -->
</template>

<script>
export default {
    name: "ChatContent",
    props: ['conversation'],
    data() {
        return {
            messages: [],
            fetched: 0,
        }
    },
    mounted() {
        // alert('New Chat Content');
        // console.log('conversation:' + this.conversation);
        fetch('/api/conversations/' + this.conversation.id + '/messages', {method: 'GET'})
            .then(response => response.json())
            .then(json => {
                this.messages = json.messages.data.reverse();
                this.$root.messages = json.messages.data.reverse();
            }).catch(error => {
            console.log(error);
        });
    },
    updated() {
        if (this.conversation && this.fetched != this.conversation.id) {
            // alert('New Chat Content');
            // console.log('<<New Chat Content>>');
            // console.log('conversation:' + this.conversation);
            fetch(`/api/conversations/${this.conversation.id}/messages`, {method: 'GET'})
                .then(response => response.json())
                .then(json => {
                    // console.log('response.json:' + json);
                    // console.log('messages:' + json.messages.data);
                    // console.log('First message:' + json.messages.data[0].body);
                    // console.log('First message user:' + json.messages.data[0].user.name);
                    // console.log('typeof message user id:' + typeof (json.messages.data[0].user_id));
                    // console.log('typeof message root user id:' + typeof (this.$root.user_id));
                    this.messages = json.messages.data.reverse();
                    this.$root.messages = json.messages.data.reverse();
                    this.fetched = this.conversation.id;

                    // console.log('New conversation:' + this.$root.conversation);
                    // for (let i in json.messages.data) {
                    //     console.log(
                    //         'ID:' + json.messages.data[i].id + 'username:' + json.messages.data[i].user.name + ' - ' + json.messages.data[i].body
                    //     )
                    // }
                }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

</style>
