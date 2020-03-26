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
                                    <div>
                                        <span class="profile-picture" v-for="image in page.gallery">
                                            <img id="avatar" class="editable img-responsive" :src="image" height="202px" width="202px" />
                                        </span>
                                    </div>
                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                        <div class="inline position-relative">
                                            <span class="white">{{page.name}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-6"></div>

                                <div class="profile-contact-info">
                                    <div class="profile-contact-links align-left">
                                        <p v-html="page.content"></p>
                                    </div>

                                    <div class="space-6"></div>
                                </div>

                                <div class="hr hr16 dotted"></div>
                            </div>

                            <div class="col-xs-12 col-sm-9">

                                <div class="space-12"></div>

                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Giá </div>

                                        <div class="profile-info-value">
                                            <span class="editable">{{formatPrice(page.price)}}</span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Danh mục </div>

                                        <div class="profile-info-value" v-if="page.categories != null">
                                            <span class="editable">{{page.categories.name}}</span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Chủ sản phẩm </div>

                                        <div class="profile-info-value" v-if="page.users != null">
                                            <span class="editable">{{page.users.name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</template>
<script>
import {PRODUCTS_DETAIL} from '../../store/actions.type.js'
export default {
    created(){
        this.fetchPage();
    },
    methods:{
        formatPrice(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        fetchPage(){
            this.$store.dispatch(PRODUCTS_DETAIL,this.$route.params.id);
        }
    },
    computed:{
        page(){
            return this.$store.getters.product;
        }
    }
}
</script>