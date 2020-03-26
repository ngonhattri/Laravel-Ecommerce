import Home from './components/Home/HomeComponent.vue'

import Error404 from './components/Error/404.vue'

import PageList from './components/Page/ListPageComponent.vue'
import PageAdd from './components/Page/AddPageComponent.vue'
import PageDetail from './components/Page/DetailPageComponent.vue'

import SchoolList from './components/School/ListSchoolComponent.vue'
import SchoolAdd from './components/School/AddSchoolComponent.vue'
import SchoolDetail from './components/School/DetailSchoolComponent.vue'

import BannerList from './components/Banner/ListBannerComponent.vue'
import BannerAdd from './components/Banner/AddBannerComponent.vue'

import ContactList from './components/Contact/ListContactComponent.vue'
import ContactAdd from './components/Contact/AddContactComponent.vue'
import ContactDetail from './components/Contact/DetailContactComponent.vue'

import CustomerList from './components/Customer/ListCustomerComponent.vue'
import CustomerDetail from './components/Customer/DetailCustomerComponent.vue'

import RulesList from './components/Rules/ListRulesComponent.vue'
import RulesAdd from './components/Rules/AddRulesComponent.vue'
import RulesDetail from './components/Rules/DetailRulesComponent.vue'

import ProductList from './components/Product/ListProductComponent.vue'
import ProductDetail from './components/Product/DetailProductComponent.vue'

import RoleList from './components/Role/ListRoleComponent.vue'
import RoleAdd from './components/Role/AddRoleComponent.vue'

import UserList from './components/User/ListUserComponent.vue'
import UserAdd from './components/User/AddUserComponent.vue'

import MainPage from './components/Page/MainPageComponent.vue'
import MainSchool from './components/School/MainSchoolComponent.vue'
import MainRole from './components/Role/MainRoleComponent.vue'
import MainUser from './components/User/MainUserComponent.vue'
import MainBanner from './components/Banner/MainBannerComponent.vue'
import MainContact from './components/Contact/MainContactComponent.vue'
import MainCustomer from './components/Customer/MainCustomerComponent.vue'
import MainProduct from './components/Product/MainProductComponent.vue'
import MainRules from './components/Rules/MainRulesComponent.vue'
import MainRulesCategory from './components/RulesCategory/MainRulesCategoryComponent.vue'
import MainCategory from './components/Category/MainCategoryComponent.vue'
export const routes= [
    {
        path: '/qanivia/', 
        component:Home, 
        name:'home'
    },
    {
        path:'/qanivia/contact/',
        component:MainContact,
        children:[
            {
                path:'',
                component:ContactList,
                name:'contact'
            },
            {
                path:'add/',
                component:ContactAdd,
                name:'contact-add'
            },
            {
                path:':id',
                component:ContactDetail,
                name:'contact-detail'
            },
        ]  
    },
    {
        path:'/qanivia/rule/',
        component:MainRules,
        children:[
            {
                path:'',
                component:RulesList,
                name:'rules'
            },
            {
                path:'add/',
                component:RulesAdd,
                name:'rules-add'
            },
            {
                path:':id',
                component:RulesDetail,
                name:'rules-detail'
            },
        ]  
    },
    {
        path:'/qanivia/customer/',
        component:MainCustomer,
        children:[
            {
                path:'',
                component:CustomerList,
                name:'customer'
            },
            {
                path:':id',
                component:CustomerDetail,
                name:'customer-detail'
            }
        ]  
    },
    {
        path:'/qanivia/banner/',
        component:MainBanner,
        children:[
            {
                path:'',
                component:BannerList,
                name:'banner'
            },
            {
                path:'add/',
                component:BannerAdd,
                name:'banner-add'
            }
        ]  
    },
    {
        path:'/qanivia/product/',
        component:MainProduct,
        children:[
            {
                path:'',
                component:ProductList,
                name:'product'
            },
            {
                path:':id',
                component:ProductDetail,
                name:'product-detail'
            }
        ]  
    },
    {
        path:'/qanivia/page/',
        component:MainPage,
        children:[
            {
                path:'',
                component:PageList,
                name:'page'
            },
            {
                path:'add/',
                component:PageAdd,
                name:'page-add'
            },
            {
                path:':id',
                component:PageDetail,
                name:'page-detail'
            },
        ]
    },
    {
        path:'/qanivia/school/',
        component:MainSchool,
        children:[
            {
                path:'',
                component:SchoolList,
                name:'school'
            },
            {
                path:'add/',
                component:SchoolAdd,
                name:'school-add'
            },
            {
                path:':id',
                component:SchoolDetail,
                name:'school-detail'
            },
        ]
    },
    {
        path:'/qanivia/role/',
        component:MainRole,
        children:[
            {
                path:'',
                component:RoleList,
                name:'role'
            },
            {
                path:'add/',
                component:RoleAdd,
                name:'role-add'
            }
        ]
    },
    {
        path:'/qanivia/user/',
        component:MainUser,
        children:[
            {
                path:'',
                component:UserList,
                name:'user'
            },
            {
                path:'add/',
                component:UserAdd,
                name:'user-add'
            }
        ]
    },
    {
        path: '/qanivia/category/', 
        component:MainCategory, 
        name:'category'
    },
    {
        path: '/qanivia/rules-category/', 
        component:MainRulesCategory, 
        name:'rules-category'
    },
    {
        path:'/qanivia/**',
        component:Error404
    }    
]