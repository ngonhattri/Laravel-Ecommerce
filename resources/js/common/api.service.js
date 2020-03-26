import axios from 'axios';
const ApiService = {
    query (resource, params, keyword){
        var config ={
            params:{
                keyword:keyword
            }
        }
        return axios.get(`${resource}?page=${params}`,config);
    },
    find(resource,params){
        return axios.get(`${resource}/${params}`);
    },
    post (resource, data){
        return axios.post(`${resource}`,data);
    },
    put (resource, params, data){
        return axios.put(`${resource}/${params}`,data);
    },
    delete(resource,params){
        return axios.delete(`${resource}/${params}`);
    },
    changed(resource,params){
        return axios.get(`${resource}/changed/${params}`);
    },
    multiple(resource,data){
        return axios.post(`${resource}/deleteMulti`,data);
    },
    all(resource){
        return axios.get(`${resource}/all`);
    },
    get(resource){
        return axios.get(`${resource}`);
    }
}
export default ApiService

export const PagesService = {
    get(config) {
        return ApiService.query('pages',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('pages',config);
    },
    show(params){
        return ApiService.find('pages',params);
    },
    update(config){
        return ApiService.put('pages',config.id,config.data);
    },
    delete(params){
        return ApiService.delete('pages',params);
    },
    changed(params){
        return ApiService.changed('pages',params);
    },
    multiple(config){
        return ApiService.multiple('pages',config);
    }
}

export const CustomersService = {
    get(config) {
        return ApiService.query('customers',config.pageNumber,config.keyword);
    },
    show(params){
        return ApiService.find('customers',params);
    }
}

export const ContactsService = {
    get(config) {
        return ApiService.query('contacts',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('contacts',config);
    },
    show(params){
        return ApiService.find('contacts',params);
    },
    update(config){
        return ApiService.put('contacts',config.id,config.data);
    },
    delete(params){
        return ApiService.delete('contacts',params);
    },
    multiple(config){
        return ApiService.multiple('contacts',config);
    }
}

export const ProductsService = {
    get(config) {
        return ApiService.query('products',config.pageNumber,config.keyword);
    },
    show(params){
        return ApiService.find('products',params);
    },
    changed(params){
        return ApiService.changed('products',params);
    },
    delete(params){
        return ApiService.delete('products',params);
    }
}

export const CategoriesService = {
    get() {
        return ApiService.get('categories');
    },
    create(config){
        return ApiService.post('categories',config);
    },
    delete(params){
        return ApiService.delete('categories',params);
    },
}

export const RulesCategoriesService = {
    get() {
        return ApiService.get('rules-categories');
    },
    create(config){
        return ApiService.post('rules-categories',config);
    },
    delete(params){
        return ApiService.delete('rules-categories',params);
    },
}

export const RulesService = {
    get(config) {
        return ApiService.query('rules',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('rules',config);
    },
    show(params){
        return ApiService.find('rules',params);
    },
    update(config){
        return ApiService.put('rules',config.id,config.data);
    },
    delete(params){
        return ApiService.delete('rules',params);
    },
    multiple(config){
        return ApiService.multiple('rules',config);
    }
}

export const BannersService = {
    get(config) {
        return ApiService.query('banners',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('banners',config);
    },
    changed(params){
        return ApiService.changed('banners',params);
    },
    delete(params){
        return ApiService.delete('banners',params);
    }
}

export const SchoolsService = {
    get(config) {
        return ApiService.query('schools',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('schools',config);
    },
    show(params){
        return ApiService.find('schools',params);
    },
    update(config){
        return ApiService.put('schools',config.id,config.data);
    },
    delete(params){
        return ApiService.delete('schools',params);
    }
}

export const SlidesService = {
    get(config) {
        return ApiService.query('slides',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('slides',config);
    },
    show(params){
        return ApiService.find('slides',params);
    },
    update(config){
        return ApiService.put('slides',config.id,config.data);
    },
    delete(params){
        return ApiService.delete('slides',params);
    },
    changed(params){
        return ApiService.changed('slides',params);
    },
    multiple(config){
        return ApiService.multiple('slides',config);
    }
}

export const RolesService = {
    get(config) {
        return ApiService.query('roles',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('roles',config);
    },
    delete(params){
        return ApiService.delete('roles',params);
    },
    multiple(config){
        return ApiService.multiple('roles',config);
    },
    permissions() {
        return ApiService.all('permissions');
    }
}

export const UsersService = {
    get(config) {
        return ApiService.query('users',config.pageNumber,config.keyword);
    },
    create(config){
        return ApiService.post('users',config);
    },
    delete(params){
        return ApiService.delete('users',params);
    },
    multiple(config){
        return ApiService.multiple('users',config);
    },
    roles() {
        return ApiService.all('roles');
    }
}
