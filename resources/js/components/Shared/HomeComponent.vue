<template>
<div>
  <div id="navbar" class="navbar navbar-default ace-save-state">
    <HeaderView></HeaderView>
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <div id="sidebar" class="sidebar responsive ace-save-state">
        <Sidebar></Sidebar>
    </div>
    <div class="main-content">
        <router-view></router-view>
    </div><!-- /.main-content -->

    <div class="footer">
        <FooterView></FooterView>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
  </div>
</div>

</template>
<script>
let Sidebar = require('./SidebarComponent');
let FooterView = require('./FooterComponent');
let HeaderView = require('./HeaderComponent');
export default {
  components:{
      Sidebar,
      FooterView,
      HeaderView,
  }
}
</script>

