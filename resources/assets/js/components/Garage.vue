<template>
  <div class="card border-primary mb-3">
    <div class="card-header">My Garage</div>
    <div class="card-body text-primary">

       <div class="row">
         <div class="col-md-12">
           <l-map :style="style" :zoom="zoom" :center="center">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="marker"></l-marker>
          </l-map>
         </div>
       </div>

      <h5 class="card-title">Primary card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
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
      zoom: 13,
      center: [47.413220, -1.219482],
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(47.413220, -1.219482),
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
