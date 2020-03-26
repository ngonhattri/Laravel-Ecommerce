<template>
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thêm mới điều lệ
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" @submit.prevent="add">   
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.title"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nội dung</label>
                                    <div class="col-sm-10">
                                        <vue-ckeditor :config="config" v-model="form.content" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Danh mục</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;" v-model="form.id_category">
                                            <option v-for="item,key in rules_category" :value="item.id">{{item.title}}</option>
                                        </select>
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
                                <router-link to="/qanivia/rule/" tag="button" class="btn btn-warning">
                                    <i class="ace-icon fa fa-close bigger-110"></i>
                                    Hủy
                                </router-link>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</template>
<script>
import VueCkeditor from 'vue-ckeditor2';
import { RULES_CREATE, FETCH_RULESCATEGORIES } from '../../store/actions.type.js'
import { ckeditor_config } from '../../helpers/ckeditor.js'
export default {
    components: { VueCkeditor },
    data() {
        return {
            form:{},
            config: ckeditor_config 
        };
    },
    created(){
        this.fetchPageList();
    },
    methods:{
        openFileManager2 () {
            window.open(`/laravel-filemanager?token=`,'newwindow', 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
                self.form.image = items
            }
            return false
        },
        fetchPageList(){
            this.$store.dispatch(FETCH_RULESCATEGORIES);
        },
        add(){
            this.$store.dispatch(RULES_CREATE,this.$data.form)
            .then(response=>{
                this.$router.push('/qanivia/rule/')
            })
            .catch(error=>{
                console.log(error.message);
            });
        }
    },
    computed:{
        rules_category(){
            return this.$store.getters.rulescategories;
        }
    }
}
</script>

