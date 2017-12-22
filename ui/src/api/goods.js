/**
 * Created by yanxs on 2017/9/28.
 */
import Vue from 'vue'

var goods = {
    getList : function(callback){
        Vue.http.post('http://api.haoin.com.cn/flash/goods/get-list',{size:10, index:0,user_id:10000},{emulateJSON :true}).then(({data}) => {
            callback(data['result'][0])
        });
    }
}

export default goods;
