import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComp from './components/pages/HomeComp.vue';
import BlogComp from './components/pages/BlogComp.vue';
import AboutComp from './components/pages/AboutComp.vue';
import ContactsComp from './components/pages/ContactsComp.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/',
            name: 'home',
            component: HomeComp
        },
        {
            path:'/blog',
            name: 'blog',
            component: BlogComp
        },
        {
            path:'/about-us',
            name: 'about',
            component: AboutComp
        },
        {
            path:'/contacts',
            name: 'contacts',
            component: ContactsComp
        }
    ]
})

export default router;
