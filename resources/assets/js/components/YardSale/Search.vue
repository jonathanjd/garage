<template>
  <div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-location-tab" data-toggle="pill" href="#pills-location" role="tab" aria-controls="pills-location" aria-selected="true">Location</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-sale-tab" data-toggle="pill" href="#pills-sale" role="tab" aria-controls="pills-sale" aria-selected="false">Sale List</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <app-tab-location></app-tab-location>
  <app-tab-sale></app-tab-sale>
</div>
  </div>
</template>

<script>
import TabLocation from './TabLocation';
import TabSale from './TabSale';
export default {
  components: {
    appTabLocation: TabLocation,
    appTabSale: TabSale
  }
}
</script>

<style>
</style>
