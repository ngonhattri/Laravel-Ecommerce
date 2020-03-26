import { BannersService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_BANNERS,
    BANNERS_CHANGED,
    BANNERS_CREATE,
    BANNERS_DELETE,
} from '../actions.type';

import {
    SET_BANNERS,
    FETCH_LOADING,
} from '../mutations.type'

const state = {
    banners: {},
    loading:false
}

export const actions = {
    [FETCH_BANNERS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return BannersService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_BANNERS, data.data)
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
    [BANNERS_CHANGED](context,articleSlug) {
        return BannersService.changed(articleSlug);
    },
    [BANNERS_CREATE](context,articleSlug) {
        return BannersService.create(articleSlug)
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
    [BANNERS_DELETE](context,articleSlug) {
        return BannersService.delete(articleSlug)
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
    [SET_BANNERS] (state, payload) {
        state.banners = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    banners (state) {
        return state.banners;
    },
    isBannerLoading(state){
        return state.loading;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  