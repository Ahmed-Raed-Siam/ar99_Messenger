<main class="main is-visible" data-dropzone-area="">
    <div class="container h-100">

        <div class="d-flex flex-column h-100 position-relative">
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
                                            @if($participant->avatar_url===null)
                                                <span class="avatar-text avatar-lg">
                                                            {{ ucfirst(substr($participant->name,0,1)) }}
                                                        </span>
                                            @else
                                                <img class="avatar-img"
                                                     src="{{ asset('uploads' . '/' . $participant->avatar_url) }}
                                                         " alt="">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col overflow-hidden">
                                        <h5 class="text-truncate">{{ $participant->name }}</h5>
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
                                                @if($participant->avatar_url===null)
                                                    <span class="avatar-text avatar-lg">
                                                                {{ ucfirst(substr($participant->name,0,1)) }}
                                                            </span>
                                                @else
                                                    <img class="avatar-img"
                                                         src="{{ asset('uploads' . '/' . $participant->avatar_url) }}"
                                                         alt="#">
                                                @endif
                                            </a>
                                            <!--Sender Current user-->
                                            <a href="#" class="avatar avatar-sm" data-bs-toggle="modal"
                                               data-bs-target="#modal-profile">
                                                <x-messenger.user-avatar/>
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

            <!-- Chat: Content -->
            <div class="chat-body hide-scrollbar flex-1 h-100">
                <div class="chat-body-inner">
                    <div class="py-6 py-lg-12" id="chat-body">

                    @if(!empty($messages))
                        @forelse ($messages as $message)
                            <!-- Message -->
                                <div
                                    class="message @if( $message->user_id === \Illuminate\Support\Facades\Auth::id()) message-out @endif">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile"
                                       class="avatar avatar-responsive">
                                        @if($message->user->avatar_url===null || $message->user->avatar_url ==="")
                                            <span class="avatar-text avatar-lg">
                                                    {{ ucfirst(substr($message->user->name,0,1)) }}
                                                </span>
                                        @else
                                            <img class="avatar-img"
                                                 src="{{ asset('uploads' . '/' . $message->user->avatar_url) }}"
                                                 alt="">
                                        @endif

                                    </a>

                                    <div class="message-inner">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="message-text">
                                                    <p>{{ $message->body }}</p>
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
                                            <span class="extra-small text-muted">{{ $message->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>send a message</p>
                        @endforelse
                    @endif
                    <!-- Divider -->

                    </div>
                </div>
            </div>
            <!-- Chat: Content -->

            <!-- Chat: Footer -->
            <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                <!-- Chat: Files -->
                <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                </div>
                <!-- Chat: Files -->

                <!-- Chat: Form -->
                <form class="chat-form rounded-pill bg-dark" data-emoji-form=""
                      action="{{ route('api.messages.store') }}" method="post">
                    @csrf
                    <input name="user_id" type="hidden" value="{{ $participant->id }}">
                    <div class="row align-items-center gx-0">
                        <div class="col-auto">
                            <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-paperclip">
                                    <path
                                        d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="col">
                            <div class="input-group">
                                    <textarea name="message" class="form-control px-0"
                                              placeholder="Type your message..." rows="1"
                                              data-emoji-input="" data-autosize="true"></textarea>

                                <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-smile"><circle cx="12" cy="12"
                                                                                               r="10"></circle><path
                                                            d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9"
                                                                                                     x2="9.01"
                                                                                                     y2="9"></line><line
                                                            x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                                </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <button class="btn btn-icon btn-primary rounded-circle ms-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Chat: Form -->
            </div>
            <!-- Chat: Footer -->
        </div>

    </div>
</main>
<!-- Chat -->
<!-- Chat: Info -->
<div class="offcanvas offcanvas-end offcanvas-aside" data-bs-scroll="true" data-bs-backdrop="false"
     tabindex="-1"
     id="offcanvas-more">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header py-4 py-lg-7 border-bottom">
        <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-chevron-left">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>

        <div class="visibility-xl overflow-hidden text-center">
            <h5 class="text-truncate">{{ $participant->name }}</h5>
            <p class="text-truncate">last seen 5 minutes ago</p>
        </div>

        <!-- Dropdown -->
        <div class="dropdown">
            <a class="icon icon-lg text-muted" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-more-vertical">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="12" cy="5" r="1"></circle>
                    <circle cx="12" cy="19" r="1"></circle>
                </svg>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        Edit
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        Mute
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center text-danger">
                        Leave
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Header -->

    <!-- Offcanvas Body -->
    <div class="offcanvas-body hide-scrollbar">
        <!-- Avatar -->
        <div class="text-center py-10">
            <div class="row gy-6">
                <div class="col-12">
                    <div class="avatar avatar-xl mx-auto">
                        @if($participant->avatar_url===null)
                            <span class="avatar-text avatar-lg">
                                    {{ ucfirst(substr($participant->name,0,1)) }}
                                </span>
                        @else
                            <img class="avatar-img"
                                 src="{{ asset('uploads' . '/' . $participant->avatar_url) }}
                                     " alt="">
                        @endif

                        <a href="#"
                           class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <h4>{{ $participant->name }}</h4>
                    <p>Bootstrap is an open source <br> toolkit for developing web with <br> HTML, CSS, and JS.
                    </p>
                </div>
            </div>
        </div>
        <!-- Avatar -->

        <!-- Tabs -->
        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#offcanvas-tab-profile" role="tab"
                   aria-controls="offcanvas-tab-profile" aria-selected="true">
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-media" role="tab"
                   aria-controls="offcanvas-tab-media" aria-selected="true">
                    Media
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-files" role="tab"
                   aria-controls="offcanvas-tab-files" aria-selected="false">
                    Files
                </a>
            </li>
        </ul>
        <!-- Tabs -->

        <!-- Tabs: Content -->
        <div class="tab-content py-2" role="tablist">
            <!-- Profile -->
            <div class="tab-pane fade show active" id="offcanvas-tab-profile" role="tabpanel">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Phone</h5>
                                <p>1-800-275-2273</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-phone-call">
                                        <path
                                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Location</h5>
                                <p>USA, Houston</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>E-mail</h5>
                                <p>chandler@ollie.com</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-mail">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="list-group list-group-flush border-top mt-8">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Notifications</h5>
                                <p>Enable sound notifications</p>
                            </div>

                            <div class="col-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                           id="accordion-security-check-5">
                                    <label class="form-check-label" for="accordion-security-check-5"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="list-group list-group-flush border-top mt-8">
                    <li class="list-group-item">
                        <a href="#" class="text-reset">Send Message</a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="text-danger">Delete Chat</a>
                    </li>
                </ul>
            </div>
            <!-- Profile -->

            <!-- Media -->
            <div class="tab-pane fade" id="offcanvas-tab-media" role="tabpanel">
                <div class="row row-cols-3 g-3 py-6">
                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-1.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/1.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-2.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/2.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-3.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/3.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-1.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/4.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-2.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/5.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-3.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/6.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-1.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/7.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-2.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/8.jpg" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                           data-theme-img-url="assets/img/chat/media-3.jpg">
                            <img class="img-fluid rounded" src="assets/img/chat/9.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Media -->

            <!-- Files -->
            <div class="tab-pane fade" id="offcanvas-tab-files" role="tabpanel">
                <ul class="list-group list-group-flush">

                    <!-- Item -->
                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <!-- Icons -->
                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm">
                                        <img src="{{ asset('assets/img/avatars/6.jpg') }}" class="avatar-img"
                                             alt="#">
                                    </a>

                                    <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-file-text"><path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline
                                                                points="14 2 14 8 20 8"></polyline><line x1="16" y1="13"
                                                                                                         x2="8"
                                                                                                         y2="13"></line><line
                                                                x1="16" y1="17" x2="8" y2="17"></line><polyline
                                                                points="10 9 9 9 8 9"></polyline></svg>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                            <!-- Icons -->

                            <!-- Text -->
                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">
                                    <a href="#">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                </h5>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">79.2 KB</small>
                                    </li>

                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">txt</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Text -->

                            <!-- Dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Download
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-download">
                                                        <path
                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Share
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2">
                                                        <circle cx="18" cy="5" r="3"></circle>
                                                        <circle cx="6" cy="12" r="3"></circle>
                                                        <circle cx="18" cy="19" r="3"></circle>
                                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Dropdown -->
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">

                            <!-- Icons-->
                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm">
                                        <img class="avatar-img" src="{{ asset('assets/img/avatars/1.jpg') }}"
                                             alt="#">
                                    </a>

                                    <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-film"><rect
                                                                x="2" y="2" width="20" height="20" rx="2.18"
                                                                ry="2.18"></rect><line x1="7" y1="2" x2="7"
                                                                                       y2="22"></line><line x1="17"
                                                                                                            y1="2"
                                                                                                            x2="17"
                                                                                                            y2="22"></line><line
                                                                x1="2" y1="12" x2="22" y2="12"></line><line x1="2"
                                                                                                            y1="7"
                                                                                                            x2="7"
                                                                                                            y2="7"></line><line
                                                                x1="2" y1="17" x2="7" y2="17"></line><line x1="17"
                                                                                                           y1="17"
                                                                                                           x2="22"
                                                                                                           y2="17"></line><line
                                                                x1="17" y1="7" x2="22" y2="7"></line></svg>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                            <!-- Icons -->

                            <!-- Text -->
                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">
                                    <a href="#">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                </h5>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">54.2 KB</small>
                                    </li>

                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">mp4</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Text -->

                            <!-- Dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Download
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-download">
                                                        <path
                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Share
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2">
                                                        <circle cx="18" cy="5" r="3"></circle>
                                                        <circle cx="6" cy="12" r="3"></circle>
                                                        <circle cx="18" cy="19" r="3"></circle>
                                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Dropdown -->
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">

                            <!-- Icons -->
                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm">
                                        <img class="avatar-img" src="{{ asset('assets/img/avatars/6.jpg') }}"
                                             alt="#">
                                    </a>

                                    <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-file-text"><path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline
                                                                points="14 2 14 8 20 8"></polyline><line x1="16" y1="13"
                                                                                                         x2="8"
                                                                                                         y2="13"></line><line
                                                                x1="16" y1="17" x2="8" y2="17"></line><polyline
                                                                points="10 9 9 9 8 9"></polyline></svg>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                            <!-- Icons -->

                            <!-- Text -->
                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">
                                    <a href="#">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                </h5>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">64.8 KB</small>
                                    </li>

                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">jpg</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Text -->

                            <!-- Dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Download
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-download">
                                                        <path
                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Share
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2">
                                                        <circle cx="18" cy="5" r="3"></circle>
                                                        <circle cx="6" cy="12" r="3"></circle>
                                                        <circle cx="18" cy="19" r="3"></circle>
                                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Dropdown -->
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">

                            <!-- Icons-->
                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm">
                                        <img class="avatar-img" src="{{ asset('assets/img/avatars/1.jpg') }}"
                                             alt="#">
                                    </a>

                                    <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-film"><rect
                                                                x="2" y="2" width="20" height="20" rx="2.18"
                                                                ry="2.18"></rect><line x1="7" y1="2" x2="7"
                                                                                       y2="22"></line><line x1="17"
                                                                                                            y1="2"
                                                                                                            x2="17"
                                                                                                            y2="22"></line><line
                                                                x1="2" y1="12" x2="22" y2="12"></line><line x1="2"
                                                                                                            y1="7"
                                                                                                            x2="7"
                                                                                                            y2="7"></line><line
                                                                x1="2" y1="17" x2="7" y2="17"></line><line x1="17"
                                                                                                           y1="17"
                                                                                                           x2="22"
                                                                                                           y2="17"></line><line
                                                                x1="17" y1="7" x2="22" y2="7"></line></svg>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                            <!-- Icons-->

                            <!-- Text -->
                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">
                                    <a href="#">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                </h5>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">80.8 KB</small>
                                    </li>

                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">mp4</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Text -->

                            <!-- Dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Download
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-download">
                                                        <path
                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Share
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2">
                                                        <circle cx="18" cy="5" r="3"></circle>
                                                        <circle cx="6" cy="12" r="3"></circle>
                                                        <circle cx="18" cy="19" r="3"></circle>
                                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Dropdown -->
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">

                            <!-- Icons-->
                            <div class="col-auto">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm">
                                        <img class="avatar-img" src="{{ asset('assets/img/avatars/6.jpg') }}"
                                             alt="#">
                                    </a>

                                    <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-image"><rect
                                                                x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle
                                                                cx="8.5" cy="8.5" r="1.5"></circle><polyline
                                                                points="21 15 16 10 5 21"></polyline></svg>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                            <!-- Icons-->

                            <!-- Text -->
                            <div class="col overflow-hidden">
                                <h5 class="text-truncate">
                                    <a href="#">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                </h5>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">100 KB</small>
                                    </li>

                                    <li class="list-inline-item">
                                        <small class="text-uppercase text-muted">jpg</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Text -->

                            <!-- Dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Download
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-download">
                                                        <path
                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                Share
                                                <div class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2">
                                                        <circle cx="18" cy="5" r="3"></circle>
                                                        <circle cx="6" cy="12" r="3"></circle>
                                                        <circle cx="18" cy="19" r="3"></circle>
                                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Dropdown -->
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Files -->
        </div>
        <!-- Tabs: Content -->
    </div>
    <!-- Offcanvas Body -->
</div>

<!-- Modal: Profile -->
<div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-0">
                <!-- Header -->
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                            <defs>
                                <style>.cls-2 {
                                        fill: #fff;
                                        opacity: 0.1;
                                    }</style>
                            </defs>
                            <g>
                                <g>
                                    <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z"/>
                                    <path class="cls-2"
                                          d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z"/>
                                    <path class="cls-2"
                                          d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z"/>
                                    <circle class="cls-2" cx="94.5" cy="57.5" r="22.5"/>
                                    <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z"/>
                                </g>
                            </g>
                        </svg>

                        <div class="position-absolute top-0 start-0 py-6 px-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-xl">
                            <x-messenger.user-avatar/>
                        </div>

                        <h4 class="mb-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                        <p>last seen 5 minutes ago</p>
                    </div>
                </div>
                <!-- Header -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Location</h5>
                                <p>USA, Houston</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>E-mail</h5>
                                <p>{{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-mail">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Phone</h5>
                                <p>1-800-275-2273</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-phone-call">
                                        <path
                                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List  -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Active status</h5>
                                <p>Show when you're active.</p>
                            </div>

                            <div class="col-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="profile-status" checked>
                                    <label class="form-check-label" for="profile-status"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#tab-settings" class="text-reset" data-theme-toggle="tab" title="Settings"
                           data-bs-dismiss="modal">Settings</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{ route('logout') }}" class="text-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
                <!-- List -->
            </div>
            <!-- Modal body -->

        </div>
    </div>
</div>

<!-- Modal: User profile -->
<div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-0">
                <!-- Header -->
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                            <defs>
                                <style>.cls-2 {
                                        fill: #fff;
                                        opacity: 0.1;
                                    }</style>
                            </defs>
                            <g>
                                <g>
                                    <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z"/>
                                    <path class="cls-2"
                                          d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z"/>
                                    <path class="cls-2"
                                          d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z"/>
                                    <circle class="cls-2" cx="94.5" cy="57.5" r="22.5"/>
                                    <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z"/>
                                </g>
                            </g>
                        </svg>

                        <div class="position-absolute top-0 start-0 p-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-xl">
                            @if($participant->avatar_url===null)
                                <span class="avatar-text avatar-lg">
                                            {{ ucfirst(substr($participant->name,0,1)) }}
                                        </span>
                            @else
                                <img class="avatar-img"
                                     src="{{ asset('uploads'.'/'.$participant) }}"
                                     alt="#">
                            @endif

                            <a href="#"
                               class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>

                        <h4 class="mb-1">{{ $participant->name }}</h4>
                        <p>last seen 5 minutes ago</p>
                    </div>
                </div>
                <!-- Header -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Location</h5>
                                <p>USA, Houston</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>E-mail</h5>
                                <p>{{ $participant->email }}</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-mail">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Phone</h5>
                                <p>1-800-275-2273</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-phone-call">
                                        <path
                                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Notifications</h5>
                                <p>Enable sound notifications</p>
                            </div>

                            <div class="col-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                           id="user-notification-check">
                                    <label class="form-check-label" for="user-notification-check"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class="text-reset">Send Message</a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="text-danger">Block User</a>
                    </li>
                </ul>
                <!-- List -->
            </div>
            <!-- Modal body -->

        </div>
    </div>
</div>
