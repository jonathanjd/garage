<template>
  <div>
    <div v-if="garageSuccess">
      <div class="car border-success">
        <div class="card-body">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Your Garage Has Been Successfully Created</p>
            <hr>
            <p class="mb-0"><strong>GarageSale.com</strong></p>
          </div>
          <h5>Summary</h5>
          <hr>
          <h5>{{ myGarageData.title }}</h5>
          <h6>Description:</h6>
          <p>{{ myGarageData.description }}</p>
          <div class="row">
            <div class="col">
              <p><strong>Start Date:</strong> {{ myFormatDateStart }}</p>
            </div>
            <div class="col">
              <p><strong>End Date:</strong> {{ myFormatDateEnd }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p><strong>Start Hour:</strong> {{ myFormatHourStart }}</p>
            </div>
            <div class="col">
              <p><strong>End Hour:</strong> {{ myFormatHourEnd }}</p>
            </div>
          </div>
          <p>
            <strong>Location:</strong> {{ myLocationInfo }}
          </p>


          <button @click="cerrar" class="btn btn-primary btn-block">Add Sale</button>
        </div>
      </div>
    </div>
    <div v-else>
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
              <component :is="componentId" :urlCurrent="url"></component>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import SaleLocation from './Step/SaleLocation';
import SaleDetails from './Step/SaleDetails';
import SalePhotos from './Step/SalePhotos';
import SaleSumamry from './Step/SaleSummary';

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
      },
      garageSuccess: false,
    }
  },

  created(){
    EventBus.$on('changeComponent', (component, value) => {
      this.componentId = component;
      this.progressbar = value;
    });

    EventBus.$on('changeGarageSuccess', () => {
      this.garageSuccess = true;
    });

  },

  computed: {
    myGarageData() {
      return this.$store.getters.getGarageData;
    },
    myFormatDateStart(){
      return `${this.$moment(this.myGarageData.startDate, 'YYYY-MM-DD').format('DD MMM YYYY')}`
    },
    myFormatDateEnd(){
      return `${this.$moment(this.myGarageData.startDate, 'YYYY-MM-DD').format('DD MMM YYYY')}`
    },
    myFormatHourStart(){
      return `${this.$moment(this.myGarageData.startHour, 'YYYY-MM-DD HH:mm:ss').format('HH:mm a')}`
    },
    myFormatHourEnd(){
      return `${this.$moment(this.myGarageData.endHour, 'YYYY-MM-DD HH:mm:ss').format('HH:mm a')}`
    },
    myLocationInfo(){
      return `${this.myGarageData.postal} ${this.myGarageData.address}, ${this.myGarageData.city}, ${this.myGarageData.state}`;
    }
  },

  props: ['url'],

  methods: {
    cerrar() {
      this.garageSuccess = false;
      this.componentId = 'appSaleLocation';
      this.progressbar = '0%';
    }
  },

  components: {
    appSaleLocation: SaleLocation,
    appSaleDetails: SaleDetails,
    appSalePhotos: SalePhotos,
    appSaleSumamry: SaleSumamry,
  }

}
</script>

<style>
</style>
