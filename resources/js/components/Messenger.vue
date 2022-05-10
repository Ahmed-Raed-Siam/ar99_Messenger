<template>
    <main class="main is-visible" data-dropzone-area="">
        <div class="container h-100">

            <div v-if="!this.$root.conversation" class="d-flex flex-column h-100 justify-content-center text-center">
                <div class="mb-6">
                            <span class="icon icon-xl text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-message-square"><path
                                    d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            </span>
                </div>

                <p class="text-muted">Pick a person from left menu, <br> and start your conversation.</p>
            </div>

            <div v-else class="d-flex flex-column h-100 position-relative">

                <!-- Chat: Header -->
                <ChatHeader :conversation="conversation"/>
                <!-- Chat: Header -->

                <!-- Chat: Content -->
                <ChatContent :conversation="conversation"/>
                <!-- Chat: Content -->

                <!-- Chat: Footer -->
                <ChatFooter :conversation="conversation"/>
                <!-- Chat: Footer -->


            </div>
        </div>
    </main>
    <!--    <div class="chat-body hide-scrollbar flex-1 h-100">-->
    <!--        <div class="chat-body-inner">-->
    <!--            <div class="py-6 py-lg-12">-->
    <!--                &lt;!&ndash; Message &ndash;&gt;-->
    <!--                <div class="message">-->
    <!--                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile"-->
    <!--                       class="avatar avatar-responsive">-->
    <!--                        <span class="avatar-text avatar-lg"></span>-->
    <!--                        <img class="avatar-img"-->
    <!--                             src='' alt="">-->
    <!--                    </a>-->

    <!--                    <div class="message-inner">-->
    <!--                        <div class="message-body">-->
    <!--                            <div class="message-content">-->
    <!--                                <div class="message-text">-->
    <!--                                    <p>body</p>-->
    <!--                                </div>-->

    <!--                                &lt;!&ndash; Dropdown &ndash;&gt;-->
    <!--                                <div class="message-action">-->
    <!--                                    <div class="dropdown">-->
    <!--                                        <a class="icon text-muted" href="#" role="button"-->
    <!--                                           data-bs-toggle="dropdown" aria-expanded="false">-->
    <!--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"-->
    <!--                                                 height="24"-->
    <!--                                                 viewBox="0 0 24 24" fill="none"-->
    <!--                                                 stroke="currentColor"-->
    <!--                                                 stroke-width="2" stroke-linecap="round"-->
    <!--                                                 stroke-linejoin="round"-->
    <!--                                                 class="feather feather-more-vertical">-->
    <!--                                                <circle cx="12" cy="12" r="1"></circle>-->
    <!--                                                <circle cx="12" cy="5" r="1"></circle>-->
    <!--                                                <circle cx="12" cy="19" r="1"></circle>-->
    <!--                                            </svg>-->
    <!--                                        </a>-->

    <!--                                        <ul class="dropdown-menu">-->
    <!--                                            <li>-->
    <!--                                                <a class="dropdown-item d-flex align-items-center"-->
    <!--                                                   href="#">-->
    <!--                                                    <span class="me-auto">Edit</span>-->
    <!--                                                    <div class="icon">-->
    <!--                                                        <svg xmlns="http://www.w3.org/2000/svg"-->
    <!--                                                             width="24"-->
    <!--                                                             height="24" viewBox="0 0 24 24"-->
    <!--                                                             fill="none"-->
    <!--                                                             stroke="currentColor" stroke-width="2"-->
    <!--                                                             stroke-linecap="round"-->
    <!--                                                             stroke-linejoin="round"-->
    <!--                                                             class="feather feather-edit-3">-->
    <!--                                                            <path d="M12 20h9"></path>-->
    <!--                                                            <path-->
    <!--                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>-->
    <!--                                                        </svg>-->
    <!--                                                    </div>-->
    <!--                                                </a>-->
    <!--                                            </li>-->
    <!--                                            <li>-->
    <!--                                                <a class="dropdown-item d-flex align-items-center"-->
    <!--                                                   href="#">-->
    <!--                                                    <span class="me-auto">Reply</span>-->
    <!--                                                    <div class="icon">-->
    <!--                                                        <svg xmlns="http://www.w3.org/2000/svg"-->
    <!--                                                             width="24"-->
    <!--                                                             height="24" viewBox="0 0 24 24"-->
    <!--                                                             fill="none"-->
    <!--                                                             stroke="currentColor" stroke-width="2"-->
    <!--                                                             stroke-linecap="round"-->
    <!--                                                             stroke-linejoin="round"-->
    <!--                                                             class="feather feather-corner-up-left">-->
    <!--                                                            <polyline-->
    <!--                                                                points="9 14 4 9 9 4"></polyline>-->
    <!--                                                            <path-->
    <!--                                                                d="M20 20v-7a4 4 0 0 0-4-4H4"></path>-->
    <!--                                                        </svg>-->
    <!--                                                    </div>-->
    <!--                                                </a>-->
    <!--                                            </li>-->
    <!--                                            <li>-->
    <!--                                                <hr class="dropdown-divider">-->
    <!--                                            </li>-->
    <!--                                            <li>-->
    <!--                                                <a class="dropdown-item d-flex align-items-center text-danger"-->
    <!--                                                   href="#">-->
    <!--                                                    <span class="me-auto">Delete</span>-->
    <!--                                                    <div class="icon">-->
    <!--                                                        <svg xmlns="http://www.w3.org/2000/svg"-->
    <!--                                                             width="24"-->
    <!--                                                             height="24" viewBox="0 0 24 24"-->
    <!--                                                             fill="none"-->
    <!--                                                             stroke="currentColor" stroke-width="2"-->
    <!--                                                             stroke-linecap="round"-->
    <!--                                                             stroke-linejoin="round"-->
    <!--                                                             class="feather feather-trash-2">-->
    <!--                                                            <polyline-->
    <!--                                                                points="3 6 5 6 21 6"></polyline>-->
    <!--                                                            <path-->
    <!--                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>-->
    <!--                                                            <line x1="10" y1="11" x2="10"-->
    <!--                                                                  y2="17"></line>-->
    <!--                                                            <line x1="14" y1="11" x2="14"-->
    <!--                                                                  y2="17"></line>-->
    <!--                                                        </svg>-->
    <!--                                                    </div>-->
    <!--                                                </a>-->
    <!--                                            </li>-->
    <!--                                        </ul>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                        </div>-->

    <!--                        <div class="message-footer">-->
    <!--                            <span class="extra-small text-muted">created_at</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
</template>
<script>
import ChatHeader from "./ChatHeader";
import ChatContent from "./ChatContent";
import ChatFooter from "./ChatFooter";

export default {
    name: "Messenger",
    components: {ChatFooter, ChatContent, ChatHeader},
    props: [
        'conversation',
    ],
    data: function () {
        return {
            conversation: null,
            messages: [],
            loading: false
        }
    },
    mounted() {
        // this.loadMessages();
    },
    methods: {
        // loadMessages: function () {
        //     axios.get('api/conversations')
        //         .then((response) => {
        //             this.messages = response.data;
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // },
    }
}
</script>
