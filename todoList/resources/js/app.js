import VueRouter from 'vue-router';

import SingUp from './components/SingUp.vue'
import App from './components/App.vue';
import AuthView from './components/AuthView.vue';
import ListTask from './components/ListTask.vue'

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('auth-component', require('./components/AuthView.vue').default);
Vue.component('sing-component', require('./components/SingUp.vue').default);

Vue.use(VueRouter);
const routesMySPA = [
    {
        path: '/singUp',
        name: 'singUp',
        component: SingUp,
    },
    {
        path: '/tasks',
        name:'tasks',
        component:ListTask
    }
]

const router = new VueRouter({
    mode:'history',
    base:process.env.BASE_URL,
    routesMySPA
})

const app = new Vue({
    el: '#app',
    components: {App},
    router
});
