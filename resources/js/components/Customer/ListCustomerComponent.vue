<template>   
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <router-link to="/" tag="a">
                    Trang chủ
                    </router-link>
                </li>
                <li class="active">Danh mục khách hàng</li>
            </ul>
        </div>
        <div class="page-content">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Quản lý khách hàng</h4>
                    <div class="widget-toolbar no-border">
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="search-active-form">
                            <div class="form-search pull-left">
                                <form class="form-inline">
                                    <input type="text" placeholder="Search ..." v-model="keyword" class="nav-search-input" />
                                    <input class="btn btn-xs" type="button" value="Tìm kiếm" @click="fetchPageList()">
                                </form>
                            </div>

                            <div class="pageSizebox pull-right">
                                <div class="pageSizeNumber">
                                    Tổng số bản ghi: {{pages.total}}
                                </div>
                            </div>
                        </div><!-- search-form -->
                        <table id="simple-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="25%">Tên</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="20%">Trạng thái</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="page in pages.data">
                                    <td>{{page.name}}</td>
                                    <td>{{page.email}}</td>
                                    <td>{{page.phone}}</td>
                                    <td v-if="page.activation_code==null"><a href="javascript:void(0)"><span class="badge badge-success">True</span></a></td>
                                    <td v-else><a href="javascript:void(0)"><span class="badge badge-danger">False</span></a></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <router-link tag="button" class="btn btn-xs btn-info" :to="`/qanivia/customer/${page.id}`">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </router-link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="isLoading == true">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <i class="fa fa-refresh fa-4x fa-spin"></i> <label class="label label-primary">Đang tải...</label>
                            </div>
                            <div class="col-xs-4"></div>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <!-- Paginate -->
                        <ul class="pagination pull-right page-list">
                            <li v-if="currentPage != 1"><a href="javascript:void(0)" @click="fetchPageList(1)">«</a></li>
                            <li v-if="currentPage != 1"><a href="javascript:void(0)" @click="fetchPageList(currentPage-1)">‹ Prev</a></li>
                            <li v-for="i in range" :class="{active : currentPage == i}">
                                <a href="javascript:void(0)" @click="fetchPageList(i)">{{i}}</a>
                            </li>
                            <li v-if="currentPage != totalPages"><a href="javascript:void(0)" @click="fetchPageList(currentPage+1)">Next ›</a></li>
                            <li v-if="currentPage != totalPages"><a href="javascript:void(0)" @click="fetchPageList(totalPages)">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { FETCH_CUSTOMERS,CUSTOMERS_CHANGED } from '../../store/actions.type.js'
export default {
    data(){
        return{
            totalPages : 0,
            currentPage : 1,
            range : [],
            keyword : ''
        }
    },
    created(){
        this.fetchPageList();
    },
    methods:{
        fetchPageList(pageNumber){
            if(pageNumber === undefined){
                pageNumber = '1';
            }
            this.$store.dispatch(FETCH_CUSTOMERS,{pageNumber,keyword:this.$data.keyword});
        }
    },
    computed:{
        pages(){
            var value = this.$store.getters.customers;
            this.$data.totalPages = value.last_page;
            this.$data.currentPage = value.current_page;
            this.$data.data = value.data;
            var pages = [];
            for(var i = 1; i <= value.last_page;i++){
                pages.push(i);
            }
            this.$data.range = pages;
            return this.$store.getters.customers;
        },
        isLoading(){
            return this.$store.getters.isCustomerLoading;
        }
    }
}
</script>
