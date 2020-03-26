import { ProductsService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_PRODUCTS,
    PRODUCTS_CHANGED,
    PRODUCTS_DELETE,
    PRODUCTS_DETAIL
} from '../actions.type';

import {
    SET_PRODUCTS,
    FETCH_LOADING,
    SET_PRODUCT,
} from '../mutations.type'

const state = {
    products: {},
    product: {},
    loading:false
}

export const actions = {
    [FETCH_PRODUCTS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return ProductsService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_PRODUCTS, data.data)
            return data;
        })
        .catch((error)=>{
            if(error.response.status == 401){
                window.location.href = "/qanivia/login";
            }
            if(error.response.status == 403){
                notification.displayError('Không đủ quyền truy cập');
            }
        });
    },
    [PRODUCTS_CHANGED](context,articleSlug) {
        return ProductsService.changed(articleSlug);
    },
    [PRODUCTS_DELETE](context,articleSlug) {
        return ProductsService.delete(articleSlug)
        .then(({data})=>{
            notification.displaySuccess(data.message);
        })
        .catch((error)=>{
            if(error.response.status == 401){
                window.location.href = "/qanivia/login";
            }
            if(error.response.status == 403){
                notification.displayError('Không đủ quyền truy cập');
            }
        });
    },
    [PRODUCTS_DETAIL](context,articleSlug) {
        return ProductsService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_PRODUCT,data.data)
            return data;
        })
        .catch((error)=>{
            if(error.response.status == 401){
                window.location.href = "/qanivia/login";
            }
            if(error.response.status == 403){
                notification.displayError('Không đủ quyền truy cập');
            }
        })
    }
}

export const mutations = {
    [SET_PRODUCTS] (state, payload) {
        state.products = payload;
        state.loading = false;
    },
    [SET_PRODUCT](state,payload) {
        state.product = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    products (state) {
        return state.products;
    },
    isProductLoading(state){
        return state.loading;
    },
    product(state){
        return state.product;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  