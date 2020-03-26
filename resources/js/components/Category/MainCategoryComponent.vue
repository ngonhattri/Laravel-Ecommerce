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
                <li class="active">Danh mục </li>
            </ul>
        </div>
        <div class="page-header">
            <h1>
                Danh mục 
            </h1>
        </div><!-- /.page-header -->
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="vspace-16-sm"></div>
                        <div class="col-sm-6">
                            <form class="form-horizontal" role="form" @submit.prevent="add">   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên</label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Thứ tự hiển thị</label>
                                            <div class="col-sm-10">
                                                <input type="number" placeholder="Số thứ tự hiển thị" class="col-xs-10 col-sm-7" v-model="form.display_order"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>          
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-info" type="submit" >
                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                            Thêm mới
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div class="dd dd-draghandle">
                                <ol class="dd-list" v-for="item,key in pages">
                                    <li class="dd-item dd2-item">
                                        <div class="dd-handle dd2-handle" @click="deletePage(item.id)">
                                            <i class="normal-icon ace-icon fa fa-remove orange bigger-130"></i>
                                        </div>
                                        <div class="dd2-content">{{item.name}}</div>
                                    </li>
                                </ol>
                            </div>
                            <div v-if="isLoading == true">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <i class="fa fa-refresh fa-4x fa-spin"></i> <label class="label label-primary">Đang tải...</label>
                                </div>
                                <div class="col-xs-4"></div>
                            </div>
                        </div>
                    </div><!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
</template>
<script>
import { FETCH_CATEGORIES,CATEGORIES_CREATE,CATEGORIES_DELETE } from '../../store/actions.type.js'
export default {
    data(){
        return{
            form:{
                name:'',
                display_order:''
            }
        }
    },
    created(){
        this.fetchPageList();
    },
    methods:{
        fetchPageList(){
            this.$store.dispatch(FETCH_CATEGORIES);
        },
        deletePage(id){
            if(confirm("Bạn có muốn xóa ?")){
                this.$store.dispatch(CATEGORIES_DELETE,id);
                this.fetchPageList(); 
            }
        },
        add(){
            this.$store.dispatch(CATEGORIES_CREATE,this.$data.form)
            .then((response)=>{
                this.$data.form.name = '';
                this.$data.form.display_order = '';
                this.fetchPageList();
            }).catch((error)=>{
                console.log(error.message);
            });
        }
    },
    computed:{
        pages(){
            return this.$store.getters.categories;
        },
        isLoading(){
            return this.$store.getters.isCategoryLoading;
        }
    }
}
</script>
