<template>
  <div class="card mt-1">
    <div class="card-body">
      <l-map :minZoom="5" :style="style" :zoom="zoom" :center="center">
        <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
      </l-map>
    </div>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {

  data(){
    return {
      style: {
        height: '500px',
      },
      zoom: 5,
      center: [37.6, -95.665],
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(37.6, -95.665),
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
