import Vue from 'vue';
import VueRouter from 'vue-router';

import Create from './components/login/Create';
import Login from './components/login/Login';

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

    ],
    mode: 'history'
});