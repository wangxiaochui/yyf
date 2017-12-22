<!-- 底部工具栏  --->
<template>
    <div class="bar-tab">
        <ul>
            <li class="bar-item" v-for="(item,index) in list" @click="setActive(index)">
                <router-link :to="item.path" >
                    <span><i class="fa fa-fw" :class="[item.icon,{active:iscur==index}]" ></i></span>
                    <p>{{item.label}}</p>
                </router-link>
            </li>

        </ul>
    </div>
</template>

<script>
    import {toolsBar,test} from '../js/setting'
    export default {
        data: () => ({
            iscur:0,
            list : toolsBar
        }),
        methods : {
            setActive(index){
                this.iscur = index
            }
        }
    }
</script>

<style>
    .fa{font-size:0.5rem}
    .bar-item a{color:gray;text-decoration: none}
    .bar-item a:hover{color:#77bdee}
    .active{color:#77bdee}
</style>