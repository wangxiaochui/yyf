<template>
  <div id="app">
    <div class="content">
      <router-view class="view"></router-view>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'app',
    data () {
      return {
        msg: 'Welcome to Your Vue.js App'
      }
    }
  }
</script>

<style lang="less">
    @import './css/less/site.less';
    @import '../node_modules/font-awesome/css/font-awesome.css';
</style>
