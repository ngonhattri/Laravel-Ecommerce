import { RulesService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_RULES,
    RULES_CREATE,
    RULES_DELETE,
    RULES_DETAIL,
    RULES_EDIT,
    RULES_MULTI
} from '../actions.type';

import {
    SET_RULES,
    FETCH_LOADING,
    SET_RULE,
} from '../mutations.type'

const state = {
    rules: {},
    rule: {},
    loading:false
}

export const actions = {
    [FETCH_RULES](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return RulesService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_RULES, data.data)
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
    [RULES_CREATE](context,articleSlug) {
        return RulesService.create(articleSlug)
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
    [RULES_DELETE](context,articleSlug) {
        return RulesService.delete(articleSlug)
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
    [RULES_DETAIL](context,articleSlug) {
        return RulesService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_RULE,data.data)
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
    },
    [RULES_EDIT](context,articleSlug) {
        return RulesService.update(articleSlug)
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
    [RULES_MULTI](context,articleSlug) {
        return RulesService.multiple(articleSlug)
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
    }
}

export const mutations = {
    [SET_RULES] (state, payload) {
        state.rules = payload;
        state.loading = false;
    },
    [SET_RULE](state,payload) {
        state.rule = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    rules (state) {
        return state.rules;
    },
    isRuleLoading(state){
        return state.loading;
    },
    rule(state){
        return state.rule;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  