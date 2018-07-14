<template>
  <l-map :minZoom="5" :style="style" :zoom="zoom" :center="center">
    <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
    <l-marker v-for="marker in myGarages" :key="marker.id" :lat-lng="marker.location"></l-marker>
  </l-map>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {

  data() {
    return {
      style: {
        height: '500px',
      },
      center: [36.116203, -119.681564],
      zoom: 5,
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(37.6, -95.665),
    }
  },

  props: ['myGarages'],

  created() {

    if (this.myGarages.length > 0) {
      const lat = this.myGarages[0].lat;
      const lng = this.myGarages[0].lng;
      this.center = [lat, lng];
      this.zoom = 12;
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
