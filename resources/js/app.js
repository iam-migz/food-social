require('./bootstrap');
window.Vue = require('vue');

import router from './router';
import App from './components/App';


const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
