<!-- 分类  --->
<template>
    <div id="category">
        <barComponent></barComponent>
        <div class="item-cate"  :click="getArticle">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
               我是分类一
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate"  v-on:click="getArticle">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类二
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类三
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类四
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类五
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类六
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>
        <div class="item-cate">
            <div class="cate-col cage-item-img">
                <img src="../assets/nopic.jpg">
            </div>
            <div class="cate-col cage-item-con">
                我是分类七
            </div>
            <div class="cate-col cage-item-flag">
                <i class="fa fa-angle-right fa-fw" ></i>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data: () => ({
            show: true
        }),
        methods:{
            getArticle:function(){
                this.$router.push("/articles/123")
            }
        }
    }
</script>

<style>

</style>