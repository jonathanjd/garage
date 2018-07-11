<template>
  <div>
    <transition name="fade" appear>
      <div class="card border-primary mb-3">
        <div class="card-header">My Garage</div>
        <div class="card-body">

          <div class="text-right">
            <button @click="back" class="btn btn-primary">Back</button>
          </div>

          <div class="row">
            <div class="col my-4">
              <l-map :style="style" :zoom="zoom" :center="myCenter">
                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                <l-marker :lat-lng="myLatLng"></l-marker>
              </l-map>
            </div>
          </div>

          <h5 class="card-title text-primary">{{ myGarageData.title }}</h5>
          <p class="card-text">{{ myGarageData.description }}</p>
          <p><strong>Location:</strong> {{ myGarageData.postal }} {{ myGarageData.address }}, {{ myGarageData.city }}, {{ formatState }}</p>
          <p><strong>Start Date:</strong> {{ this.$moment(myGarageData.startDate, 'YYYY-MM-DD').format('DD MMM YYYY') }}</p>
          <p><strong>End Date:</strong> {{ this.$moment(myGarageData.endDate, 'YYYY-MM-DD').format('DD MMM YYYY') }}</p>
          <p><strong>Hour:</strong> {{ this.$moment(myGarageData.startHour, 'HH:mm:ss').format('HH:mm a') }} - {{ this.$moment(myGarageData.endHour , 'HH:mm:ss').format('HH:mm a')}}</p>
          <div class="text-right">
            <button @click="back" class="btn btn-primary">Back</button>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>


<script>

import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {


  data(){
    return {
      style: {
        height: '300px',
      },
      zoom: 20,
      center: [47.413220, -1.219482],
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(47.413220, -1.219482),
    }
  },

  computed: {
    myGarageData() {
      return this.$store.getters.getGarageData;
    },

    myCenter(){
      return [this.myGarageData.location.lat, this.myGarageData.location.lng];
    },

    myLatLng() {
      return L.latLng(this.myGarageData.location.lat, this.myGarageData.location.lng);
    },

    formatState() {
      return this.myGarageData.state.name
    }
  },

  methods: {
    back(){
      EventBus.$emit('showGarage', false);
      EventBus.$emit('showMyDashboard');

    }
  },

  components: {
    LMap,
    LTileLayer,
    LMarker
  },

}
</script>

<style>
@import '~leaflet/dist/leaflet.css';
</style>
