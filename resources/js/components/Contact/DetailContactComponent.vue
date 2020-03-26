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
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="E-mail" class="col-xs-10 col-sm-7" v-model="form.email"/>
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
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Số điện thoại" class="col-xs-10 col-sm-7" v-model="form.phone"/>
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
                                <router-link to="/qanivia/contact/" tag="button" class="btn btn-warning">
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
import {CONTACTS_DETAIL, CONTACTS_EDIT} from '../../store/actions.type.js'
export default {
    data() {
        return {
            form:{}
        };
    },
    mounted(){
        this.$store.dispatch(CONTACTS_DETAIL,this.$route.params.id);
    },
    methods:{
        edit(){
            this.$store.dispatch(CONTACTS_EDIT,{id:this.$route.params.id,data:this.$data.form})
            .then(response=>{
                this.$router.push('/qanivia/contact/')
            })
            .catch(error=>{
                console.log(error.message);
            });
        }
    },
    computed:{
        page(){
            this.$data.form = this.$store.getters.contact;
            return this.$store.getters.contact;
        }
    }
}
</script>
