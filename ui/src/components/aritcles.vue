<!-- 头部标题栏  --->
<template>
    <div id="articles">
        <div class="article-cate">
            <div class="cate-item-a">
                aaaaaa
            </div>
            <div class="cate-item-a">
                bbbbb
            </div>
            <div class="cate-item-a">
                cccccc
            </div>
            <div class="cate-item-a">
                ddddd
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data: () => ({
            show: true
        })
    }
</script>

<style>
    .article-cate{width:10rem;display:flex}
    .cate-item-a{width:2.5rem;flex-direction: row}
</style>