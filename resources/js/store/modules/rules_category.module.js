import { RulesCategoriesService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_RULESCATEGORIES,
    RULESCATEGORIES_CREATE,
    RULESCATEGORIES_DELETE,
} from '../actions.type';

import {
    SET_RULESCATEGORIES,
    FETCH_LOADING,
} from '../mutations.type'

const state = {
    rulescategories: {},
    loading:false
}

export const actions = {
    [FETCH_RULESCATEGORIES](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return RulesCategoriesService.get()
        .then(({data})=> {
            context.commit(SET_RULESCATEGORIES, data.data)
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
    [RULESCATEGORIES_CREATE](context,articleSlug) {
        return RulesCategoriesService.create(articleSlug)
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
    [RULESCATEGORIES_DELETE](context,articleSlug) {
        return RulesCategoriesService.delete(articleSlug)
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
    [SET_RULESCATEGORIES] (state, payload) {
        state.rulescategories = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    rulescategories (state) {
        return state.rulescategories;
    },
    isRulesCategoryLoading(state){
        return state.loading;
    },
}

export default {
    state,
    actions,
    mutations,
    getters
}
  