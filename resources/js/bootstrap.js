import {API_URL} from './common/config';
window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.baseURL = API_URL
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


