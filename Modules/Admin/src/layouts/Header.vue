<script setup>
import AppSearch from "@/components/AppSearch/AppSearch.vue";
import AppQuickCreate from "./AppQuickCreate.vue";
import {PlusOutlined} from '@ant-design/icons-vue';
import AppNotification from "@/components/AppNotification/AppNotification.vue";


</script>
<template>
  <div class="header flex content-center justify-between">

    <!-- Logo -->

    <!-- /Logo -->
    <span></span>
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
      <li class="nav-item dropdown has-arrow flag-nav">
        <a class="nav-link dropdown-toggle focus:bg-[#eeeeee]" data-dropdown-toggle="dropdown"
           href="javascript:void(0);" role="button">
          <img src="@/assets/img/flags/us1.png" alt="" height="20">
        </a>
        <div id="dropdown"
             class="hidden dropdown-menu dropdown-menu-right !translate-x-0 !translate-y-0 !top-[60px] bg-white">
          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">
            <img src="@/assets/img/flags/us.png" alt="" height="16"> English
          </a>
          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">
            <img src="@/assets/img/flags/fr.png" alt="" height="16"> French
          </a>
          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">
            <img src="@/assets/img/flags/es.png" alt="" height="16"> Spanish
          </a>
          <a href="javascript:void(0);" class="dropdown-item hover:bg-[#eeeeee]">
            <img src="@/assets/img/flags/de.png" alt="" height="16"> German
          </a>
        </div>
      </li>
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
