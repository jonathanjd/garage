<template>
  <div class="card">
  <h5 class="card-header">Post Your Garage Sale For Free</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="progress">
          <div class="progress-bar" role="progressbar" :style="{'width': progressbar}" :aria-valuenow="progressbar" aria-valuemin="0" aria-valuemax="100">{{ progressbar }}</div>
        </div>
      </div>
      <div class="col-md-12">
        <component :is="componentId"></component>
      </div>
    </div>
  </div>
</div>
</template>

<script>

import SaleLocation from './Step/SaleLocation';
import SaleDetails from './Step/SaleDetails';

export default {

  data() {
    return {
      progressbar: '0%',
      componentId: 'appSaleLocation',
      garageData: {
        location: {
          lat: null,
          lng: null
        }
      }
    }
  },

  created(){
    EventBus.$on('changeComponent', (component, value) => {
      this.componentId = component;
      this.progressbar = value;
    });

  },

  components: {
    appSaleLocation: SaleLocation,
    appSaleDetails: SaleDetails
  }

}
</script>

<style>
</style>
