<template>
  <div>
    <ul class="nav nav-list">

        <router-link :to="{ name: 'home'}" tag="li">
        <a>
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Trang chủ </span>
        </a>
        <b class="arrow"></b>
        </router-link>

        <router-link :to="{ name: 'page'}" tag="li">
        <a>
            <i class="menu-icon fa fa-book"></i>
            <span class="menu-text"> Page </span>
        </a>
        <b class="arrow"></b>
        </router-link>

        <router-link :to="{ name: 'category'}" tag="li">
        <a>
            <i class="menu-icon fa fa-navicon"></i>
            <span class="menu-text"> Danh mục sản phẩm </span>
        </a>
        <b class="arrow"></b>
        </router-link>

        <router-link :to="{ name: 'rules-category'}" tag="li">
        <a>
            <i class="menu-icon fa fa-navicon"></i>
            <span class="menu-text"> Danh mục điều khoản </span>
        </a>
        <b class="arrow"></b>
        </router-link>
        <li class="">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">
                    Khách hàng
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <router-link :to="{ name: 'customer'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thông tin thành viên
                    </a>
                    <b class="arrow"></b>
                </router-link>
                <router-link :to="{ name: 'product'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sản phẩm
                    </a>
                    <b class="arrow"></b>
                </router-link>
            </ul>
        </li>
        <li class="">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text">
                    Website
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <router-link :to="{ name: 'school'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Trường
                    </a>
                    <b class="arrow"></b>
                </router-link>
                <router-link :to="{ name: 'rules'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Điều khoản
                    </a>
                    <b class="arrow"></b>
                </router-link>
                <router-link :to="{ name: 'banner'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Banner
                    </a>
                    <b class="arrow"></b>
                </router-link>
                <router-link :to="{ name: 'contact'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Liên hệ
                    </a>
                    <b class="arrow"></b>
                </router-link>
            </ul>
        </li>
        <li class="">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">
                    System
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <router-link :to="{ name: 'role'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        Roles and Permissions
                    </a>

                    <b class="arrow"></b>
                </router-link>
                <router-link :to="{ name: 'user'}" tag="li">
                    <a>
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Management
                    </a>
                    <b class="arrow"></b>
                </router-link>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
  </div>
</template>
