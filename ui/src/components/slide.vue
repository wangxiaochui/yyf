<!-- 轮播图  -->
<template>
    <div id="slide">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="img in images">
                    <img :src="img" class="slide-img">
                </div>
            </div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
</template>

<script>
    import '../third/swiper/swiper'
    var imageList = [
        'http://www.myshop.com/upload/images/1.jpg',
        'http://www.myshop.com/upload/images/4.jpg',
        'http://www.myshop.com/upload/images/7.jpg',
        'http://www.myshop.com/upload/images/10.jpg'
    ]
    export default {
        data: () => ({
            show: true,
            images : imageList
        }),
        mounted:function(){
            var mySwiper = new Swiper ('.swiper-container', {
                watchSlidesProgress : true,
                autoplay: 3000,
                loop: true,
                pagination: '.swiper-pagination',

            })
        }
    }
</script>

<style>
@import "../third/swiper/swiper.css";
    #slide{}
    .swiper-slide{}
    .slide-img{width:100%;height:6rem;}
</style>