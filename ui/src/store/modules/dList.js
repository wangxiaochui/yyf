/**
 * Created by Administrator on 2016/12/19.
 */
import * as types from '../mutation-types'
import Vue from 'vue'
const state = {
    list: []
}

const getters = {
    //checkoutStatus: state => state.checkoutStatus
    list_dat : state => state.list
}

const actions = {
    getList ({ commit, state }) {
        //console.log(state)
        Vue.http.get('http://slim_vue.com/test').then(({data}) => {
            //console.log(data)
           // state.list = JSON.parse(data);
            let ldata = JSON.parse(data)

            commit(types.DEMO_SEARCH, {ldata})
        });
    }
}

    // mutations
const mutations = {
    [types.DEMO_SEARCH] (state, { ldata }) {
        console.log(ldata)
        state.list = ldata
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}