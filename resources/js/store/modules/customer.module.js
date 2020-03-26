import { CustomersService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_CUSTOMERS,
    CUSTOMERS_DETAIL,
} from '../actions.type';

import {
    SET_CUSTOMERS,
    FETCH_LOADING,
    SET_CUSTOMER,
} from '../mutations.type'

const state = {
    customers: {},
    customer: {},
    loading:false
}

export const actions = {
    [FETCH_CUSTOMERS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return CustomersService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_CUSTOMERS, data.data)
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
    [CUSTOMERS_DETAIL](context,articleSlug) {
        return CustomersService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_CUSTOMER,data.data)
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
    [SET_CUSTOMERS] (state, payload) {
        state.customers = payload;
        state.loading = false;
    },
    [SET_CUSTOMER](state,payload) {
        state.customer = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    customers (state) {
        return state.customers;
    },
    isCustomerLoading(state){
        return state.loading;
    },
    customer(state){
        return state.customer;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  