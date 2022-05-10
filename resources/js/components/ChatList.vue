<template>
    <div class="container py-8">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="fw-bold m-0">Chats</h2>
        </div>

        <!-- Search -->
        <div class="mb-6">
            <form action="#">
                <div class="input-group">
                    <div class="input-group-text">
                        <div class="icon icon-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>

                    <input type="text" class="form-control form-control-lg ps-0"
                           placeholder="Search messages or users"
                           aria-label="Search for messages or users...">
                </div>
            </form>
        </div>

        <!-- Chats -->
        <div class="card-list" id="chat-list">
            <a v-for="conversation in conversations" v-bind:key="conversation.id"
               :href="'conversations/'+conversation.id" @click.prevent="setConversation(conversation)"
               class="card border-0 text-reset">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-auto">
                            <div class="avatar avatar-online">
                                <span class="avatar-text avatar-lg"
                                      v-if="conversation.participants[0].avatar_url === null">
                                    {{ (conversation.participants[0].name.substring(0, 1)).toUpperCase() }}
                                </span>
                                <img v-else
                                     v-bind:src="'uploads'+'/'+conversation.participants[0].avatar_url"
                                     alt="#"
                                     class="avatar-img">
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="me-auto mb-0">{{ conversation.participants[0].name }}</h5>
                                <span
                                    class="text-muted extra-small ms-2">{{
                                        $root.moment(conversation.last_message.created_at).fromNow()
                                    }}</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="line-clamp me-auto">
                                    {{ conversation.last_message.body.substring(0, 30) }}
                                </div>

                                <div class="badge badge-circle bg-primary ms-5">
                                    <span>3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-body -->
            </a>
            <!-- Card -->
            <!-- Card/loading -->
            <a href="chat-direct.html" class="card border-0 text-reset">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-auto">
                            <div class="avatar">
                                <svg class="avatar-img placeholder-img" width="100%"
                                     height="100%"
                                     xmlns="http://www.w3.org/2000/svg" role="img"
                                     aria-label="Placeholder"
                                     preserveAspectRatio="xMidYMid slice"
                                     focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                </svg>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="placeholder-glow w-100 mb-0">
                                    <span class="placeholder col-5"></span>
                                </h5>
                            </div>

                            <div class="placeholder-glow">
                                <span class="placeholder col-12"></span>
                                <span class="placeholder col-8"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-body -->
            </a>
            <!-- Card/loading -->

            <!-- Card/loading -->
            <a href="chat-direct.html" class="card border-0 text-reset">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-auto">
                            <div class="avatar">
                                <svg class="avatar-img placeholder-img" width="100%"
                                     height="100%"
                                     xmlns="http://www.w3.org/2000/svg" role="img"
                                     aria-label="Placeholder"
                                     preserveAspectRatio="xMidYMid slice"
                                     focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                </svg>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="placeholder-glow  w-100  mb-0">
                                    <span class="placeholder col-5"></span>
                                </h5>
                            </div>

                            <div class="placeholder-glow">
                                <span class="placeholder col-12"></span>
                                <span class="placeholder col-8"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-body -->
            </a>
            <!-- Card/loading -->
        </div>

        <!-- Chats -->
    </div>

</template>

<script>
export default {
    name: "ChatList",
    data() {
        return {
            conversations: [],
        }
    },
    methods: {
        setConversation(conversation) {
            this.$root.conversation = conversation;
            // alert('Conversation:' + conversation.id);
        },
    },
    mounted() {
        // alert('Hi AR#99');
        fetch('/api/conversations', {method: 'GET'})
            .then(response => response.json())
            .then(json => {
                // console.log(json);
                // console.log(json.auth_user);
                // console.log(json.data.data);
                // console.log('First element:', json.data.data[0]);
                this.conversations = json.data.data
                this.$root.conversations = json.data.data
                this.$root.auth_user = json.auth_user
                // for (let i in json.data.data) {
                //     console.log(
                //         'ID:' + json.data.data[i].id + '-' + json.data.data[i].participants[0].name
                //     )
                // }
            }).catch(error => {
            console.log(error);
        });
    },
}
// console.log('moment:'+moment('2022-05-06T21:14:51.000000Z').fromNow())
</script>

<style scoped>

</style>
