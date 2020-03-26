import Vue from 'vue'
import Vuex from 'vuex'

import page from './modules/page.module'
import role from './modules/role.module'
import user from './modules/user.module'
import school from './modules/school.module'
import banner from './modules/banner.module'
import category from './modules/category.module'
import contact from './modules/contact.module'
import customer from './modules/customer.module'
import product from './modules/product.module'
import rules_category from './modules/rules_category.module'
import rules from './modules/rules.module'
Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        page,
        role,
        user,
        school,
        banner,
        category,
        contact,
        customer,
        product,
        rules_category,
        rules
    }
})
