import { SchoolsService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_SCHOOLS,
    SCHOOLS_CREATE,
    SCHOOLS_DELETE,
    SCHOOLS_DETAIL,
    SCHOOLS_EDIT
} from '../actions.type';

import {
    SET_SCHOOL,
    FETCH_LOADING,
    SET_SCHOOLS,
} from '../mutations.type'

const state = {
    schools: {},
    school: {},
    loading:false
}

export const actions = {
    [FETCH_SCHOOLS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return SchoolsService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_SCHOOLS, data.data);
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
    [SCHOOLS_CREATE](context,articleSlug) {
        return SchoolsService.create(articleSlug)
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
    [SCHOOLS_DELETE](context,articleSlug) {
        return SchoolsService.delete(articleSlug)
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
    [SCHOOLS_DETAIL](context,articleSlug) {
        return SchoolsService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_SCHOOL,data.data)
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
    [SCHOOLS_EDIT](context,articleSlug) {
        return SchoolsService.update(articleSlug)
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
    }
}

export const mutations = {
    [SET_SCHOOLS] (state, payload) {
        state.schools = payload;
        state.loading = false;
    },
    [SET_SCHOOL](state,payload) {
        state.school = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    schools (state) {
        return state.schools;
    },
    isSchooLoading(state){
        return state.loading;
    },
    school(state){
        return state.school;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  