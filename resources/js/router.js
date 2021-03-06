import Vue from 'vue';
import VueRouter from 'vue-router';

import Create from './components/login/Create';
import Login from './components/login/Login';
import NotFound from './components/NotFound';

// Seller Pages
import Seller from './components/seller/Seller';
import AddFood from './components/seller/AddFood';
import FoodList from './components/seller/FoodList';
import EditFood from './components/seller/EditFood';
import Orders from './components/seller/Orders';
import CompletedOrders from './components/seller/CompletedOrders';
import NewOrders from './components/seller/NewOrders';

// Customer Pages
import Customer from './components/customer/Customer';
import Foods from './components/customer/Foods';
import Restaurants from './components/customer/Restaurants';
import ViewFood from './components/customer/ViewFood';

import CustomerOrders from './components/customer/CustomerOrders';
import YourOrders from './components/customer/YourOrders';
import MadeOrders from './components/customer/MadeOrders';

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
                { path: 'orders', component: Orders, children: 
                    [
                        { path: 'new', component: NewOrders }, 
                        { path: 'completed', component: CompletedOrders }
                    ] 
                },
                { path: 'edit/:food_id', component: EditFood },
            ]
        },

        { path: '/:id/customer', component: Customer , children: 
            [
                { path: 'foods', component: Foods },
                { path: 'restaurants', component: Restaurants },
                { path: 'orders', component: CustomerOrders, children: 
                    [
                        { path: 'new', component: YourOrders },
                        { path: 'completed', component: MadeOrders }
                    ]
                },
                { path: 'view/:index', component: ViewFood }
            ]
        },


        { path: '*', component: NotFound }
    ],
    mode: 'history'
});