import { UsersService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_USERS,
    USERS_CREATE,
    USERS_DELETE,
    USERS_MULTI,
    USERS_ROLE
} from '../actions.type';

import {
    SET_USERS,
    FETCH_LOADING,
    ALL_ROLES
} from '../mutations.type'

const state = {
    users: {},
    all_roles:{},
    loading:false
}

export const actions = {
    [FETCH_USERS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return UsersService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_USERS, data.data)
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
    [USERS_CREATE](context,articleSlug) {
        return UsersService.create(articleSlug)
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
    [USERS_DELETE](context,articleSlug) {
        return UsersService.delete(articleSlug)
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
    [USERS_MULTI](context,articleSlug) {
        return UsersService.multiple(articleSlug)
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
    [USERS_ROLE](context){
        return UsersService.roles()
        .then(({data})=>{
            context.commit(ALL_ROLES, data.data)
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
    }
}

export const mutations = {
    [SET_USERS] (state, payload) {
        state.users = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    },
    [ALL_ROLES] (state, payload) {
        state.all_roles = payload;
    }
}

const getters = {
    users (state) {
        return state.users;
    },
    isUserLoading(state){
        return state.loading;
    },
    all_roles(state){
        return state.all_roles;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  