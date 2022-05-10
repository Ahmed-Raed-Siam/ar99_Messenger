<template>
    <!-- Chat: Header -->
    <div class="chat-header border-bottom py-4 py-lg-7">
        <div class="row align-items-center">

            <!-- Mobile: close -->
            <div class="col-2 d-xl-none">
                <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>
            </div>
            <!-- Mobile: close -->

            <!-- Content -->
            <div class="col-8 col-xl-12">
                <div class="row align-items-center text-center text-xl-start">
                    <!-- Title -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online d-none d-xl-inline-block">
                                    <span v-if="conversation.participants[0].avatar_url === null"
                                          class="avatar-text avatar-lg">
                                        {{
                                            (conversation.participants[0].name.substring(0, 1)).toUpperCase()
                                        }}
                                    </span>
                                    <img v-else class="avatar-img"
                                         v-bind:src="'uploads'+'/'+conversation.participants[0].avatar_url "
                                         alt="">
                                </div>
                            </div>

                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">{{
                                        conversation.participants[0].name
                                    }}</h5>
                                <p class="text-truncate">is typing<span
                                    class='typing-dots'><span>.</span><span>.</span><span>.</span></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Title -->

                    <!-- Toolbar -->
                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="row align-items-center justify-content-end gx-6">
                            <div class="col-auto">
                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas"
                                   data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>
                            </div>

                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal"
                                       data-bs-target="#modal-user-profile">
                                        <!--Participant-->
                                        <span v-if="conversation.participants[0].avatar_url === null"
                                              class="avatar-text avatar-lg">
                                                {{ (conversation.participants[0].name.substring(0, 1)).toUpperCase() }}
                                        </span>
                                        <img v-else class="avatar-img"
                                             :src="'uploads'+'/'+conversation.participants[0].avatar_url"
                                             alt="#">
                                    </a>
                                    <!--Sender Current user-->
                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal"
                                       data-bs-target="#modal-profile">
                                        <span
                                            v-if="$root.auth_user.avatar_url === null"
                                            class="avatar-text avatar-lg">
                                            {{
                                                $root.auth_user.name.substring(0, 1).toUpperCase()
                                            }}
                                        </span>
                                        <img v-else class="avatar-img"
                                             :src="'uploads'+'/'+$root.auth_user.avatar_url"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Toolbar -->
                </div>
            </div>
            <!-- Content -->

            <!-- Mobile: more -->
            <div class="col-2 d-xl-none text-end">
                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas"
                   data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-more-vertical">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="5" r="1"></circle>
                        <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                </a>
            </div>
            <!-- Mobile: more -->
        </div>
    </div>
    <!-- Chat: Header -->
</template>

<script>
export default {
    name: "ChatHeader",
    props: ['conversation'],
    data() {
        return {}
    },
    mounted() {
        // alert('mounted Chat Header');
        // console.log('conversation:', this.conversation);
        // console.log('$root conversation:', this.$root.conversation);
        // console.log('user_id:', this.$root.user_id);
        // console.log(this.user.name.substring(0, 1).toUpperCase());
    },
    updated() {
        // alert('updated Chat Header');
        // console.log('conversation:', this.conversation);
        // console.log('$root conversation:', this.$root.conversation);
        // console.log('auth_user:', this.$root.auth_user);
        // console.log('user_id:', this.$root.user_id);
    }
}
</script>

<style scoped>

</style>
