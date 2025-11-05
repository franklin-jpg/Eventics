  <div class="app-menu">

            <!-- App Logo -->
            <a href="index.html" class="logo-box">
                <!-- Light Logo -->
                <div class="logo-light">
                    <img src="dashboard_assets/images/logo.png" class="logo-lg h-[22px]" alt="Light logo">
                    <img src="dashboard_assets/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                </div>

                <!-- Dark Logo -->
                <div class="logo-dark">
                    <img src="dashboard_assets/images/logo-dark.png" class="logo-lg h-[22px]" alt="Dark logo">
                    <img src="dashboard_assets/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                </div>
            </a>

            <!-- Sidenav Menu Toggle Button -->
            <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                <span class="sr-only">Menu Toggle Button</span>
                <i class="ri-checkbox-blank-circle-line text-xl"></i>
            </button>

            <!--- Menu -->
            <div class="scrollbar" data-simplebar>
                <ul class="menu" data-fc-type="accordion">
                    <li class="menu-title">Navigation</li>

                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-home-4-line"></i>
                            </span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-title">Apps</li>

                     <li class="menu-item">
                        <a href="{{ route('admin.user.user.info') }}" class="menu-link">
                            <span class="menu-icon">
                              <i class="ri-user-line"></i>
                            </span>
                            <span class="menu-text"> User </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.event-categories.index') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-calendar-event-line"></i>
                            </span>
                            <span class="menu-text"> Category </span>
                        </a>
                    </li>
                     <li class="menu-item">
                        <a href="{{ route('admin.events.index') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-calendar-event-line"></i>
                            </span>
                            <span class="menu-text"> Events </span>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-mail-line"></i>
                            </span>
                            <span class="menu-text"> Event Bookings </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden">
                           

                             <li class="menu-item">
                                <a href="{{ route('admin.all.events') }}" class="menu-link">
                                    <span class="menu-text">All  Bookings</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('admin.completed.events') }}" class="menu-link">
                                    <span class="menu-text">Completed  Bookings</span>
                                </a>
                            </li>
                            

                             <li class="menu-item">
                                <a href="{{ route('admin.pending.events')}}" class="menu-link">
                                    <span class="menu-text">Pending Bookings</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                

                     <li class="menu-item">
                        <a href="{{ route('admin.transaction') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-money-dollar-circle-line"></i>
                            </span>
                            <span class="menu-text"> Transactions </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-task-line"></i>
                            </span>
                            <span class="menu-text"> Tasks </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hidden">
                            <li class="menu-item">
                                <a href="apps-tasks-list.html" class="menu-link">
                                    <span class="menu-text">List</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="apps-tasks-details.html" class="menu-link">
                                    <span class="menu-text">Details</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="apps-kanban.html" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-list-check-3"></i>
                            </span>
                            <span class="menu-text">Kanban Board</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="apps-file-manager.html" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-folder-2-line"></i>
                            </span>
                            <span class="menu-text"> File Manager </span>
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>

                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon"><i class="ri-pages-line"></i></span>
                            <span class="menu-text"> Pages </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden">
                            <li class="menu-item">
                                <a href="pages-starter.html" class="menu-link">
                                    <span class="menu-text">Starter</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-profile.html" class="menu-link">
                                    <span class="menu-text">Profile</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-timeline.html" class="menu-link">
                                    <span class="menu-text">Timeline</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-invoice.html" class="menu-link">
                                    <span class="menu-text">Invoice</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-faqs.html" class="menu-link">
                                    <span class="menu-text">FAQs</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-pricing.html" class="menu-link">
                                    <span class="menu-text">Pricing</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-maintenance.html" class="menu-link">
                                    <span class="menu-text">Maintenance</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>