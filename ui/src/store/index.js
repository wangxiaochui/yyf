/**
 * Created by Administrator on 2016/12/19.
 */
import Vue from 'vue'
import Vuex from 'vuex'
// import * as actions from './actions'
 import * as getters from './getters'
import goods from './modules/goods'
Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    // actions,
     getters,
    modules: {
         goods
    }
})
