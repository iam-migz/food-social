import Vue from 'vue';
import VueRouter from 'vue-router';

import Create from './components/login/Create';
import Login from './components/login/Login';

// Seller Pages
import SellerLanding from './components/seller/SellerLanding';

// Customer Pages
import CustomerLanding from './components/customer/CustomerLanding';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { 
            path: '/',
            redirect: '/create'
        },
        { 
            path: '/create',
            component: Create
        },
        { 
            path: '/login',
            component: Login
        },
        {
            path: '/sellerlanding',
            component: SellerLanding
        },
        {
            path: '/customerlanding',
            component: CustomerLanding
        }
    ],
    mode: 'history'
});