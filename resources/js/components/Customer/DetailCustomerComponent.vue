<template>
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li class="active">{{page.name}}</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="hr dotted"></div>
                    <div>
                        <div id="user-profile-1" class="user-profile row">
                            <div class="col-xs-12 col-sm-3 center">
                                <div>
                                    <span class="profile-picture">
                                        <img id="avatar" class="editable img-responsive" alt="Quân Avatar" :src="page.avatar" height="202px" width="202px" />
                                    </span>
                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                        <div class="inline position-relative">
                                            <span class="white">{{page.name}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-6"></div>

                                <div class="profile-contact-info">
                                    <div class="profile-contact-links align-left">
                                        {{page.about}}
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="profile-social-links align-center">
                                        <a :href="page.facebook" target="_blank" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                                            <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                                        </a>

                                        <a :href="page.instagram" target="_blank" class="tooltip-error" title="" data-original-title="Visit my Instagram">
                                            <i class="middle ace-icon fa fa-instagram fa-2x red"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="hr hr16 dotted"></div>
                            </div>

                            <div class="col-xs-12 col-sm-9">

                                <div class="space-12"></div>

                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> E-mail </div>

                                        <div class="profile-info-value">
                                            <span class="editable">{{page.email}}</span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Số điện thoại </div>

                                        <div class="profile-info-value">
                                            <span class="editable">{{page.phone}}</span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Trường </div>

                                        <div class="profile-info-value" v-if="page.school != null">
                                            <span class="editable">{{page.school.name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Quản lý sản phẩm</h4>
                    <div class="widget-toolbar no-border">
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="search-active-form">
                        </div><!-- search-form -->
                        <table id="simple-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="25%">Tên</th>
                                    <th width="25%">Giá</th>
                                    <th width="25%">Trạng thái</th>
                                    <th width="25%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="item in array">
                                    <td>{{item.name}}</td>
                                    <td>{{formatPrice(item.price)}}</td>
                                    <td v-if="item.status==1"><a href="javascript:void(0)"><span class="badge badge-success" @click="change(item.id)">True</span></a></td>
                                    <td v-else><a href="javascript:void(0)"><span class="badge badge-danger" @click="change(item.id)">False</span></a></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <router-link tag="button" class="btn btn-xs btn-info" :to="`/qanivia/product/${item.id}`">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </router-link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</template>
<script>
import {CUSTOMERS_DETAIL, PRODUCTS_CHANGED, PRODUCTS_DELETE} from '../../store/actions.type.js'
export default {
    data() {
        return {
            array:[]
        };
    },
    created(){
        this.fetchPage();
    },
    methods:{
        formatPrice(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        fetchPage(){
            this.$store.dispatch(CUSTOMERS_DETAIL,this.$route.params.id);
        },
        change(id){
            this.$store.dispatch(PRODUCTS_CHANGED,id);
            this.fetchPage();   
        },
        deletePage(id){
            if(confirm("Bạn có muốn xóa ?")){
                this.$store.dispatch(PRODUCTS_DELETE,id);
                this.fetchPage(); 
            }
        }
    },
    computed:{
        page(){
            this.$data.array = this.$store.getters.customer.products;
            return this.$store.getters.customer;
        }
    }
}
</script>

