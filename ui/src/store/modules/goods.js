/**
 * Created by yanxs on 2017/9/28.
 */
import * as types from '../mutation-types'
import goods from '../../api/goods'
const state = {
    goodsList: null,
    info:'test'
}

// getters
const getters = {
    goodsList: state=>state.goodsList
}

    // actions
const actions = {
    getAllGoods ({ commit, state }) {
        goods.getList(function(data){
            commit(types.GET_GOODS_LIST,{data})
        })
    }
}

// mutations
const mutations = {
    [types.GET_GOODS_LIST] (state, { data }) {
        state.goodsList = data['list']
        //console.log(state.goodsList)
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
