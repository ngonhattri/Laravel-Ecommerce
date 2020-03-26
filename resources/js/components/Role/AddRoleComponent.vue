<template>
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thêm mới Role
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
                                <div class="widget-box widget-color-blue2">
                                    <div class="widget-header">
                                        <h4 class="widget-title lighter smaller">Chọn quyền</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main padding-8">
                                            <ul class="tree tree-unselectable">
                                                <li class="tree-branch tree-open" v-for="folder in permissions">
                                                    <div class="tree-branch-header">
                                                        <span class="tree-branch-name">
                                                            <i class="icon-folder ace-icon tree-minus"></i>
                                                            <span class="tree-label">{{folder.name}}</span>
                                                        </span>
                                                    </div>
                                                    <ul class="tree-branch-children">
                                                        <li class="tree-item" v-for="permission in folder.permission" @click="checked(permission.id)">
                                                            <input type="checkbox" :checked="selection.indexOf(permission.id) > -1" />
                                                            <span class="tree-label">{{permission.title}}</span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" >
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Thêm mới
                                    </button>
                                    <router-link to="/qanivia/role/" tag="button" class="btn btn-warning">
                                        <i class="ace-icon fa fa-close bigger-110"></i>
                                        Hủy
                                    </router-link>
                                </div>
                            </div>
                        </div>          
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</template>
<script>
import { ROLES_PERMISSION ,ROLES_CREATE } from '../../store/actions.type.js'
export default {
    data() {
        return {
            form:{},
            selection:[],
        };
    },
    created(){
        this.fetchListPermission();
    },
    methods:{
        add(){
            if(confirm("Bạn có muốn thêm ? (Thêm sẽ không sửa được)")){
                this.$store.dispatch(ROLES_CREATE,{data:this.$data.form,permissions:this.$data.selection})
                .then((response)=>{
                    this.$router.push('/qanivia/role/')
                }).catch((error)=>{
                    console.log(error);
                });
            }
        },
        fetchListPermission(){
            this.$store.dispatch(ROLES_PERMISSION);
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
    },
    computed:{
        permissions(){
            return this.$store.getters.permissions;
        }
    }
}
</script>


