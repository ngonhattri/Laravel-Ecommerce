import { PagesService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_PAGES,
    PAGES_CHANGED,
    PAGES_CREATE,
    PAGES_DELETE,
    PAGES_DETAIL,
    PAGES_EDIT,
    PAGES_MULTI
} from '../actions.type';

import {
    SET_PAGES,
    FETCH_LOADING,
    SET_PAGE,
} from '../mutations.type'

const state = {
    pages: {},
    page: {},
    loading:false
}

export const actions = {
    [FETCH_PAGES](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return PagesService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_PAGES, data.data)
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
    [PAGES_CHANGED](context,articleSlug) {
        return PagesService.changed(articleSlug);
    },
    [PAGES_CREATE](context,articleSlug) {
        return PagesService.create(articleSlug)
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
    [PAGES_DELETE](context,articleSlug) {
        return PagesService.delete(articleSlug)
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
    [PAGES_DETAIL](context,articleSlug) {
        return PagesService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_PAGE,data.data)
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
    [PAGES_EDIT](context,articleSlug) {
        return PagesService.update(articleSlug)
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
    [PAGES_MULTI](context,articleSlug) {
        return PagesService.multiple(articleSlug)
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
    [SET_PAGES] (state, payload) {
        state.pages = payload;
        state.loading = false;
    },
    [SET_PAGE](state,payload) {
        state.page = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    pages (state) {
        return state.pages;
    },
    isPageLoading(state){
        return state.loading;
    },
    page(state){
        return state.page;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  