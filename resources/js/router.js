import Vue from 'vue';
import VueRouter from 'vue-router';

import Create from './components/login/Create';
import Login from './components/login/Login';
import NotFound from './components/NotFound';

// Seller Pages
import Seller from './components/seller/Seller';
import AddFood from './components/seller/AddFood';
import FoodList from './components/seller/FoodList';
import Orders from './components/seller/Orders';
import EditFood from './components/seller/EditFood';

// Customer Pages
import CustomerLanding from './components/customer/CustomerLanding';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', redirect: '/login' },

        { path: '/create', component: Create },
        { path: '/login', component: Login },

        { path: '/:id/seller', component: Seller, children: 
            [
                { path: 'add', component: AddFood },
                { path: 'list', component: FoodList },
                { path: 'orders', component: Orders },
                { path: 'edit/:food_id', component: EditFood },
                
            ]
        },

        { path: '/customerlanding', component: CustomerLanding },
        { path: '*', component: NotFound }
    ],
    mode: 'history'
});