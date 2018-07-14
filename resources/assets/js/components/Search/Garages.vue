<template>
<div class="card-columns">
  <appGarage v-for="(item, index) in myGarages" :myData="item" :key="item.id"></appGarage>
</div>
</template>

<script>
import Garage from './Garage';
export default {

  props: ['myGarages'],

  components: {
    appGarage: Garage
  }

}
</script>

<style>
</style>
