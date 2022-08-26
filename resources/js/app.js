
require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import Toasted from 'vue-toasted';

import Vue from 'vue';

//import VueRouter from 'vue-router';


import store from './store';

Vue.config.productionTip = false
Vue.use(Toasted, {
  duration: 3000
})

Vue.use(VueRouter);

// Shared components
import Appbar from './components/Shared/Appbar.vue';

// Public components
import Home from './components/Users/Home.vue';
import Product from './components/Users/Product.vue';
import Checkout from './components/Users/Checkout.vue';

import Login from './components/Admin/Login.vue';

// Admin components
import Admin from './components/Admin/Index.vue';
import ListUsers from './components/Admin/ListUsers.vue';
import UserCreate from './components/Admin/UserCreate.vue';
import UserEdit from './components/Admin/UserEdit.vue';
import ProductList from './components/Admin/ProductList.vue';
import ProductCreate from './components/Admin/ProductCreate.vue';
import ProductEdit from './components/Admin/ProductEdit.vue';

const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/shop/product/:id/:slug',
        component: Product,
    },
    {
        path: '/checkout',
        component: Checkout,
    },
    {
        path: '/login',
        component: Login,
    },
    {
        path: '/admin',
        component: Admin,
    },
    {
        path: '/admin/users',
        component: ListUsers,
    },
    {
        path: '/admin/users/create',
        component: UserCreate,
    },
    {
        path: '/admin/users/edit/:id',
        component: UserEdit,
    },
    {
        path: '/admin/products',
        component: ProductList,
    },
    {
        path: '/admin/products/create',
        component: ProductCreate,
    },
    {
        path: '/admin/products/edit/:id',
        component: ProductEdit,
    }
];

const router = new VueRouter({routes});

// //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('home-page', require('./components/Users/Home.vue').default);
// Vue.component('form-component', require('./components/Admin/Form.vue').default);

//Administrator componentes
//Vue.component('list-users', require('./components/Admin/ListUsers.vue').default);

const app = new Vue({
    store,
    el: '#app',
    components: {
        'appbar': Appbar
    },
    router: router,    
    data: {
        drawer: false,
        tab: null,
        items: [
            'web', 'shopping', 'videos', 'images', 'news',
        ],
    },
});

