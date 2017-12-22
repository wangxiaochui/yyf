<template>
  <div id="index">
    <headerComponent></headerComponent>
    <barComponent></barComponent>
    <div id="content">

    </div>

    <!-- flex弹性布局 -->
    <div id="jgg" class="jgg">
      <div v-for="item in list" class="jgg-item">
        <img v-bind:src="item.thumb">
        <p>{{item.name}}</p>
        <p  style="color:red;">¥<span class="price">{{item.sell_price}}</span><span class="font12">起</span></p>
      </div>

    </div>
    <!-- 弹性布局end -->


    <!-- 广告位 -->
    <!--<div id="ad">
      <img src="http://www.myshop.com/upload/images/ad.jpg">
    </div> -->
    <!-- 广告位end -->
    <!-- <div v-for="good in list">
         sfsfdsdf
     </div> -->

    <div style="height:1.2rem;background:#fff"></div>
  </div>

</template>

<script>
  import { mapGetters } from 'vuex'
  export default {
    data: () => ({
      show: true
    }),
    created: function () {
      console.log(this.$store.getters)
      this.$store.dispatch('getAllGoods')
    },
    computed: {
      ...mapGetters({
        list: 'goodsList',
      })
    }
  }
</script>

<style>
  #content{margin-top:1rem}
  #ad{width:100%;height:2rem;overflow: hidden;margin-top:0.3rem}
  #ad img{width:100%;}
</style>
