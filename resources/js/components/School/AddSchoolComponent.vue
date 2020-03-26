<template>
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thêm mới trường
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" @submit.prevent="add">   
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Địa chỉ" class="col-xs-10 col-sm-7" v-model="form.address"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-actions">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Tên" class="col-xs-10 col-sm-7" v-model="form.meta_keyword"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Meta Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="col-xs-10 col-sm-7" v-model="form.meta_description"></textarea>
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
                                    Thêm mới
                                </button>
                                <router-link to="/qanivia/school/" tag="button" class="btn btn-warning">
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
import { SCHOOLS_CREATE } from '../../store/actions.type.js'
export default {
    data() {
        return {
            form:{
                image:'server/image/placeholder.png'
            }
        };
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
        add(){
            this.$store.dispatch(SCHOOLS_CREATE,this.$data.form)
            .then(response=>{
                this.$router.push('/qanivia/school/')
            })
            .catch(error=>{
                console.log(error.message);
            });
        }
    }
}
</script>

