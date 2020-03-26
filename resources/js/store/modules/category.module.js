import { CategoriesService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_CATEGORIES,
    CATEGORIES_CREATE,
    CATEGORIES_DELETE,
} from '../actions.type';

import {
    SET_CATEGORIES,
    FETCH_LOADING,
} from '../mutations.type'

const state = {
    categories: {},
    loading:false
}

export const actions = {
    [FETCH_CATEGORIES](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return CategoriesService.get()
        .then(({data})=> {
            context.commit(SET_CATEGORIES, data.data)
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
    [CATEGORIES_CREATE](context,articleSlug) {
        return CategoriesService.create(articleSlug)
        .then(({data})=>{
            notification.displaySuccess(data.message);
        })
        .catch((error)=>{
            notification.displayError(error.response.data.message);
            if(error.response.status == 401){
                window.location.href = "/qanivia/login";
            }
            if(error.response.status == 403){
                notification.displayError('Không đủ quyền truy cập');
            }
            throw new Error(error.response.data.message);
        });
    },
    [CATEGORIES_DELETE](context,articleSlug) {
        return CategoriesService.delete(articleSlug)
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
}

export const mutations = {
    [SET_CATEGORIES] (state, payload) {
        state.categories = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    categories (state) {
        return state.categories;
    },
    isCategoryLoading(state){
        return state.loading;
    },
}

export default {
    state,
    actions,
    mutations,
    getters
}
  