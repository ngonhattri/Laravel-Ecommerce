import { ContactsService } from '../../common/api.service';
import notification from '../../helpers/notification';
import {
    FETCH_CONTACTS,
    CONTACTS_CREATE,
    CONTACTS_DELETE,
    CONTACTS_DETAIL,
    CONTACTS_EDIT,
    CONTACTS_MULTI
} from '../actions.type';

import {
    SET_CONTACTS,
    FETCH_LOADING,
    SET_CONTACT,
} from '../mutations.type'

const state = {
    contacts: {},
    contact: {},
    loading:false
}

export const actions = {
    [FETCH_CONTACTS](context, articleSlug) {
        context.commit(FETCH_LOADING);
        return ContactsService.get(articleSlug)
        .then(({data})=> {
            context.commit(SET_CONTACTS, data.data)
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
    [CONTACTS_CREATE](context,articleSlug) {
        return ContactsService.create(articleSlug)
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
    [CONTACTS_DELETE](context,articleSlug) {
        return ContactsService.delete(articleSlug)
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
    [CONTACTS_DETAIL](context,articleSlug) {
        return ContactsService.show(articleSlug)
        .then(({data})=>{
            context.commit(SET_CONTACT,data.data)
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
    [CONTACTS_EDIT](context,articleSlug) {
        return ContactsService.update(articleSlug)
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
    [CONTACTS_MULTI](context,articleSlug) {
        return ContactsService.multiple(articleSlug)
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
    [SET_CONTACTS] (state, payload) {
        state.contacts = payload;
        state.loading = false;
    },
    [SET_CONTACT](state,payload) {
        state.contact = payload;
        state.loading = false;
    },
    [FETCH_LOADING](state,payload){
        state.loading = true;
    }
}

const getters = {
    contacts (state) {
        return state.contacts;
    },
    isContactLoading(state){
        return state.loading;
    },
    contact(state){
        return state.contact;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}
  