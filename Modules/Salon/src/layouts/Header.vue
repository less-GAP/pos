<script setup>
import AppSearch from "@/components/AppSearch/AppSearch.vue";
import AppQuickCreate from "./AppQuickCreate.vue";
import {PlusOutlined} from '@ant-design/icons-vue';
import AppNotification from "@/components/AppNotification/AppNotification.vue";


</script>
<template>
  <div class="header flex content-center justify-between">

    <div :class="$appState.showMenu?'active':''" class="header-left  relative w-full " style="
    display: inline-flex;
    justify-content: space-between;
    padding: 10px;
    align-items: center;
">

      <a href="/" class="logo logo-normal">
        <img src="@/assets/img/logo.png" alt="">
      </a>
      <a href="/" class="logo logo-white">
        <img src="@/assets/img/logo-white.png" alt="">
      </a>
      <a href="/" class="logo-small">
        <img src="@/assets/img/logo-small.png" alt="">
      </a>

      <button @click="$appState.showMenu = !$appState.showMenu" :class="$appState.showMenu?'active':''"
              class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
    </a>
    <div>
      <AppSearch></AppSearch>
    </div>

    <!-- Header Menu -->
    <ul class="nav user-menu">

      <!-- /Search -->

      <!-- Flag -->
<!--      <li class="nav-item dropdown">-->
<!--        <a href="javascript:void(0);" class="dropdown-toggle focus:bg-[#eeeeee] nav-link">-->
<!--          <button-->
<!--            class="btn h-full w-8  active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-slate-500 dark:text-navy-100" fill="none"-->
<!--                 viewBox="0 0 24 24" stroke="currentColor">-->
<!--              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>-->
<!--            </svg>-->
<!--          </button>-->
<!--        </a>-->

<!--      </li>-->
<!--      <li class="nav-item dropdown has-arrow flag-nav">-->
<!--        <a class="nav-link dropdown-toggle focus:bg-[#eeeeee]" data-dropdown-toggle="dropdown"-->
<!--           href="javascript:void(0);" role="button">-->
<!--          <img src="@/assets/img/flags/us1.png" alt="" height="20">-->
<!--        </a>-->
<!--        <div id="dropdown"-->
<!--             class="hidden dropdown-menu dropdown-menu-right !translate-x-0 !translate-y-0 !top-[60px] bg-white">-->
<!--          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">-->
<!--            <img src="@/assets/img/flags/us.png" alt="" height="16"> English-->
<!--          </a>-->
<!--          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">-->
<!--            <img src="@/assets/img/flags/fr.png" alt="" height="16"> French-->
<!--          </a>-->
<!--          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">-->
<!--            <img src="@/assets/img/flags/es.png" alt="" height="16"> Spanish-->
<!--          </a>-->
<!--          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">-->
<!--            <img src="@/assets/img/flags/de.png" alt="" height="16"> German-->
<!--          </a>-->
<!--        </div>-->
<!--      </li>-->
      <!-- /Flag -->

      <!-- Notifications -->
      <li class="nav-item dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle focus:bg-[#eeeeee] nav-link"
           data-dropdown-toggle="dropdownNotify">
          <img src="@/assets/img/icons/notification-bing.svg" alt="img"> <span
          class="badge rounded-pill rounded-full">4</span>
        </a>
        <div id="dropdownNotify"
             class="hidden dropdown-menu notifications !inset-auto !translate-y-0 !right-0 !top-[60px] bg-white">
          <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
          </div>
          <div class="noti-content">
            <ul class="notification-list">
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="@/assets/img/profiles/avatar-02.jpg">
												</span>
                    <div class="media-body flex-grow">
                      <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span
                        class="noti-title">Patient appointment booking</span></p>
                      <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="@/assets/img/profiles/avatar-03.jpg">
												</span>
                    <div class="media-body flex-grow">
                      <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name
                        <span class="noti-title">Appointment booking with payment gateway</span></p>
                      <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="@/assets/img/profiles/avatar-06.jpg">
												</span>
                    <div class="media-body flex-grow">
                      <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span
                        class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to
                        project <span class="noti-title">Doctor available module</span></p>
                      <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="@/assets/img/profiles/avatar-17.jpg">
												</span>
                    <div class="media-body flex-grow">
                      <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span
                        class="noti-title">Patient and Doctor video conferencing</span></p>
                      <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="@/assets/img/profiles/avatar-13.jpg">
												</span>
                    <div class="media-body flex-grow">
                      <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span
                        class="noti-title">Private chat module</span></p>
                      <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="topnav-dropdown-footer">
            <a href="activities.html">View all Notifications</a>
          </div>
        </div>
      </li>
      <!-- /Notifications -->

      <li class="nav-item dropdown has-arrow main-drop">
        <a href="javascript:void(0);" class="dropdown-toggle focus:bg-[#eeeeee] nav-link userset"
           data-dropdown-toggle="dropdownProfile">
							<span class="user-img"><img src="@/assets/img/profiles/avator1.jpg" alt="">
							<span class="status online"></span></span>
        </a>
        <div id="dropdownProfile"
             class="hidden dropdown-menu menu-drop-user !inset-auto !translate-y-0 !right-0 !top-[60px] bg-white">
          <div class="profilename">
            <div class="profileset">
									<span class="user-img"><img src="@/assets/img/profiles/avator1.jpg" alt="">
									<span class="status online"></span></span>
              <div class="profilesets">
                <h6>John Doe</h6>
                <h5>Admin</h5>
              </div>
            </div>
            <hr class="!m-0">
            <a class="dropdown-item" href="profile.html"> <i class="mr-2" data-feather="user"></i> My Profile</a>
            <a class="dropdown-item" href="generalsettings.html"><i class="mr-2"
                                                                    data-feather="settings"></i>Settings</a>
            <hr class="!m-0">
            <a class="dropdown-item logout !pb-0" href="signin.html"><img src="@/assets/img/icons/log-out.svg"
                                                                          class="mr-2" alt="img">Logout</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
      <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-dropdown-toggle="dropdownMobile"
         aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
      <div class="hidden dropdown-menu dropdown-menu-right" id="dropdownMobile">
        <a class="dropdown-item" href="profile.html">My Profile</a>
        <a class="dropdown-item" href="generalsettings.html">Settings</a>
        <a class="dropdown-item" href="signin.html">Logout</a>
      </div>
    </div>
    <!-- /Mobile Menu -->
  </div>
</template>
<style>
.menu-toggle span {
  --tw-translate-x: 0px;
  background-color: currentColor;
  height: 2px;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  transition-duration: .15s;
  transition-duration: .25s;
  transition-property: all;
  transition-timing-function: cubic-bezier(.4, 0, .2, 1);
  width: 1.25rem;
}

.space-y-1\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-bottom: calc(0.375rem * var(--tw-space-y-reverse));
  margin-top: calc(0.375rem * (1 - var(--tw-space-y-reverse)));
}

.space-y-1\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-bottom: calc(0.375rem * var(--tw-space-y-reverse));
  margin-top: calc(0.375rem * (1 - var(--tw-space-y-reverse)));
}

.menu-toggle span:nth-child(2) {
  width: 0.75rem;
}

.menu-toggle.active span:first-child {
  --tw-rotate: -45deg;
  width: 0.75rem;

}

.menu-toggle.active span:nth-child(2) {
  display: none;
}

.menu-toggle.active span:nth-child(3) {
  --tw-rotate: 45deg;
  width: 0.75rem;

}
</style>
