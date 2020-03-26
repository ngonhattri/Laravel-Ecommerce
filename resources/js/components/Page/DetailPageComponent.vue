<template>
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{page.name}}
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" @submit.prevent="edit">   
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nội dung</label>
                                    <div class="col-sm-10">
                                        <vue-ckeditor :config="config" v-model="form.content" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-actions">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" class="ace ace-switch ace-switch-4" v-model="form.status" />
										<span class="lbl middle"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.seo_title"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Meta Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="col-xs-10 col-sm-7" v-model="form.seo_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Ảnh</label>
                                    <div class="col-sm-10">
                                        <li class="list-inline"><img :src="form.image" height="150px;" width="150px;"></li>
                                        <button type="button" class="btn btn-default" @click="openFileManager2">Thêm ảnh</button>
                                    </div>
                                </div>
                            </div>
                        </div>          
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Sửa
                                </button>
                                <router-link to="/qanivia/page/" tag="button" class="btn btn-warning">
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
import {PAGES_DETAIL, PAGES_EDIT} from '../../store/actions.type.js'
import { ckeditor_config } from '../../helpers/ckeditor.js'
export default {
    components: { VueCkeditor },
    data() {
        return {
            form:{},
            config: ckeditor_config
        };
    },
    mounted(){
        this.$store.dispatch(PAGES_DETAIL,this.$route.params.id);
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
        edit(){
            this.$store.dispatch(PAGES_EDIT,{id:this.$route.params.id,data:this.$data.form})
            .then(response=>{
                this.$router.push('/qanivia/page/')
            })
            .catch(error=>{
                console.log(error.message);
            });
        }
    },
    computed:{
        page(){
            this.$data.form = this.$store.getters.page;
            return this.$store.getters.page;
        }
    }
}
</script>
