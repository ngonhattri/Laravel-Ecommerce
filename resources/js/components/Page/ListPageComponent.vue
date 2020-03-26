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
                <li class="active">Danh mục Page</li>
            </ul>
        </div>
        <div class="page-content">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Quản lý page</h4>
                    <div class="widget-toolbar no-border">
                        <router-link :to="{ name: 'page-add'}">
                        <a class="btn btn-sm btn-info">
                            <i class="ace-icon fa fa-plus"></i> Thêm mới page
                        </a>
                        </router-link>
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
                                    <th class="center" width="10%">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" v-model="all" @click="selectAll()" /> All
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Alias</th>
                                    <th width="20%">Ngày tạo</th>
                                    <th width="20%">Trạng thái</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="page in pages.data">
                                    <td class="center">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" :checked="selection.indexOf(page.id) > -1" @click="checked(page.id)" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td>{{page.name}}</td>
                                    <td>{{page.alias}}</td>
                                    <td>{{page.created_at}}</td>
                                    <td v-if="page.status==1"><a href="javascript:void(0)"><span class="badge badge-success" @click="change(page.id)">True</span></a></td>
                                    <td v-else><a href="javascript:void(0)"><span class="badge badge-danger" @click="change(page.id)">False</span></a></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <router-link tag="button" class="btn btn-xs btn-info" :to="`/qanivia/page/${page.id}`">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </router-link>

                                            <button class="btn btn-xs btn-danger" @click="deletePage(page.id)">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </button>
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
                        <button class="btn btn-xs btn-danger pull-left" @click="deleteMultiple()" id="btnDelete" disabled>
                            <i class="ace-icon fa fa-trash-o"></i>
                            <span class="bigger-110">Xóa</span>
                        </button>
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
import { FETCH_PAGES,PAGES_DELETE,PAGES_CHANGED,PAGES_MULTI } from '../../store/actions.type.js'
export default {
    data(){
        return{
            totalPages : 0,
            currentPage : 1,
            range : [],
            keyword : '',
            selection:[],
            isAll:false,
            data:[],
            all:false
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
            this.$store.dispatch(FETCH_PAGES,{pageNumber,keyword:this.$data.keyword});
        },
        deletePage(id){
            if(confirm("Bạn có muốn xóa ?")){
                this.$store.dispatch(PAGES_DELETE,id);
                this.fetchPageList(); 
            }
        },
        change(id){
            this.$store.dispatch(PAGES_CHANGED,id);
            this.fetchPageList();   
        },
        deleteMultiple(){
            if(confirm("Bạn có muốn xóa toàn bộ ?")){
                this.$store.dispatch(PAGES_MULTI,this.$data.selection);
                this.$data.selection = [];
                $('#btnDelete').attr('disabled','disabled');      
                this.$data.all = false;     
                this.fetchPageList(); 
            };
        },
        checked(item){
            var idx = this.$data.selection.indexOf(item);
            if (idx > -1) {
                this.$data.selection.splice(idx, 1);
            }
            else {
                this.$data.selection.push(item);
            }
            if(this.$data.selection.length) {
                $('#btnDelete').removeAttr('disabled');
            }
            else {
                $('#btnDelete').attr('disabled','disabled');
            }
        },
        selectAll(){
            this.$data.all = true;
            let _this = this;
            if(this.$data.isAll === false) {
                this.$data.data.forEach(function(item){
                    _this.checked(item.id);
                });
                this.$data.isAll = true;
            } else {
                this.$data.data.forEach(function(item){
                    _this.checked(item.id);
                })
                this.$data.isAll = false;
            }
        },
    },
    computed:{
        pages(){
            var value = this.$store.getters.pages;
            this.$data.totalPages = value.last_page;
            this.$data.currentPage = value.current_page;
            this.$data.data = value.data;
            var pages = [];
            for(var i = 1; i <= value.last_page;i++){
                pages.push(i);
            }
            this.$data.range = pages;
            return this.$store.getters.pages;
        },
        isLoading(){
            return this.$store.getters.isPageLoading;
        }
    }
}
</script>
