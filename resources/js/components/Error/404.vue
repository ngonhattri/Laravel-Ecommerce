<template>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="error-container">
                            <div class="well">
                                <h1 class="grey lighter smaller">
                                    <span class="blue bigger-125">
                                        <i class="ace-icon fa fa-sitemap"></i>
                                        404
                                    </span>
                                    Page Not Found
                                </h1>

                                <hr />
                                <h3 class="lighter smaller">Trang bạn kiếm hiện không tồn tại</h3>

                                <div>

                                    <div class="space"></div>
                                    <h4 class="smaller">Hãy thử các bước sau:</h4>

                                    <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                        <li>
                                            <i class="ace-icon fa fa-hand-o-right blue"></i>
                                            Gõ lại link địa chỉ phù hợp
                                        </li>

                                        <li>
                                            <i class="ace-icon fa fa-hand-o-right blue"></i>
                                            Liên hệ Admin
                                        </li>

                                        <li>
                                            <i class="ace-icon fa fa-hand-o-right blue"></i>
                                            Tắt máy ngủ
                                        </li>
                                    </ul>
                                </div>

                                <hr />
                                <div class="space"></div>

                                <div class="center">
                                    <router-link :to="{ name: 'home'}">
                                    <a href="#" class="btn btn-primary">
                                        <i class="ace-icon fa fa-tachometer"></i>
                                        Dashboard
                                    </a>
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</template>
