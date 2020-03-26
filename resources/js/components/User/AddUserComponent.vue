<template>
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thêm mới admin
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" @submit.prevent="add">   
                        <div class="row">
                            <div class="col-sm-6">
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
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Username" class="col-xs-10 col-sm-7" v-model="form.username"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Quyền</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;" v-model="form.role_id">
                                            <option v-for="item,key in role_category" :value="item.id">{{item.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-actions">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Email" class="col-xs-10 col-sm-7" v-model="form.email"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Số điện thoại" class="col-xs-10 col-sm-7" v-model="form.phone"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Địa chỉ facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Facebook" class="col-xs-10 col-sm-7" v-model="form.facebook"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" placeholder="Mật khẩu" class="col-xs-10 col-sm-7" v-model="form.password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Re-Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" placeholder="Nhập lại mật khẩu" class="col-xs-10 col-sm-7" v-model="form.password_confirmation"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Ảnh</label>
                                    <div class="col-sm-10">
                                        <li class="list-inline"><img :src="form.avatar" height="150px;" width="150px;"></li>
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
                                <router-link to="/qanivia/user/" tag="button" class="btn btn-warning">
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
import { USERS_ROLE ,USERS_CREATE } from '../../store/actions.type.js'
export default {
    data() {
        return {
            form:{
                avatar:'server/image/placeholder.png'
            },
            data:[],
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
                self.form.avatar = items
            }
            return false
        },
        fetchPageList(){
            this.$store.dispatch(USERS_ROLE);
        },
        add(){
            if(confirm("Bạn có muốn thêm ? (Thêm sẽ không sửa được)")){
                this.$store.dispatch(USERS_CREATE,this.$data.form)
                .then((response)=>{
                    this.$router.push('/qanivia/user/')
                }).catch((error)=>{
                    console.log(error);
                });
            }
        }
    },
    computed:{
        role_category(){
            return this.$store.getters.all_roles;
        }
    }
}
</script>

