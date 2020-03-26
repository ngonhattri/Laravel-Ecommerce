import { RolesService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_ROLES,
    ROLES_CREATE,
    ROLES_DELETE,
    ROLES_MULTI,
    ROLES_PERMISSION,
} from '../actions.type';

import {
    SET_ROLES,
    FETCH_LOADING,
    ALL_PERMISSIONS,
} from '../mutations.type'

const state = {
    roles: {},
    permissions:{},
    loading:false
}

export const actions = {
    [FETCH_ROLES](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return RolesService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_ROLES, data.data)
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
    [ROLES_CREATE](context,articleSlug) {
        return RolesService.create(articleSlug)
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
    [ROLES_DELETE](context,articleSlug) {
        return RolesService.delete(articleSlug)
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
    [ROLES_MULTI](context,articleSlug) {
        return RolesService.multiple(articleSlug)
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
    [ROLES_PERMISSION](context){
        return RolesService.permissions()
        .then(({data})=>{
            context.commit(ALL_PERMISSIONS, data.data)
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
}

export const mutations = {
    [SET_ROLES] (state, payload) {
        state.roles = payload;
        state.loading = false;
    },
    [ALL_PERMISSIONS] (state, payload) {
        state.permissions = payload;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    roles (state) {
        return state.roles;
    },
    isRoleLoading(state){
        return state.loading;
    },
    permissions(state){
        return state.permissions;
    },
}

export default {
    state,
    actions,
    mutations,
    getters
}
  