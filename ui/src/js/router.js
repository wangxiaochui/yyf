import Vue from 'vue'
import VueRouter from "vue-router"
import VueResource from 'vue-resource'

Vue.use(VueRouter);
Vue.use(VueResource);

// import indexComponent from '../components/index_bak.vue'
// import headerComponent from '../components/header.vue'

//按需加载
const indexComponent = resolve=>require(['../components/index.vue'],resolve)
const headerComponent = resolve=>require(['../components/header.vue'],resolve)
const slideComponent = resolve=>require(['../components/slide.vue'],resolve)
const barComponent = resolve=>require(['../components/bar_tab.vue'],resolve)
const cateComponent = resolve=>require(['../components/category.vue'],resolve)
const articelsComponent = resolve=>require(['../components/aritcles.vue'],resolve)

// import slideComponent from '../components/slide.vue'
// import barComponent from '../components/bar_tab.vue'
// import cateComponent from '../components/category.vue'
// import articelsComponent from '../components/aritcles.vue'

// import indexComponent from '../components/index.vue'
// import headerComponent from '../components/header.vue'
// import slideComponent from '../components/slide.vue'
// import barComponent from '../components/bar_tab.vue'
// import cateComponent from '../components/category.vue'
// import articelsComponent from '../components/aritcles.vue'

const router = new VueRouter({
    mode: 'history',
    // history: false,
    hashbang: true,
    base: __dirname,
    routes: [
        {
            path: '/index',
            component: indexComponent
        },
        {
            path: '/',
            component: indexComponent
        },
        {
            path: '/category',
            component: cateComponent
        },
        {
            path: '/articles/:cate_id',
            name:'articles',
            component: articelsComponent
        }
    ]
});
Vue.component('headerComponent',headerComponent);
Vue.component('slideComponent',slideComponent)
Vue.component('barComponent',barComponent)

export default router
