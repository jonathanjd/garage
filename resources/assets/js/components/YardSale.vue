<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <app-search></app-search>
      </div>
      <div class="col-md-12">
        <app-map></app-map>
      </div>
    </div>
  </div>
</template>

<script>
import Map from './YardSale/Map';
import Search from './YardSale/Search';
export default {

  components: {
    appMap: Map,
    appSearch: Search
  }

}
</script>

<style>
</style>
