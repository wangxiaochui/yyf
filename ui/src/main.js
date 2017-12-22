import './third/flexible/flexible_css'
import './third/flexible/flexible'
import Vue from 'vue'
//import ElementUi from 'element-ui'
//import 'element-ui/lib/theme-default/index.css'
import Vuex from 'vuex'

import App from './App.vue'
import store from './store/index'
Vue.use(Vuex)

import router from './js/router'
new Vue({
  router: router,
  store,
  el: '#app',
  render: h => h(App)
})
