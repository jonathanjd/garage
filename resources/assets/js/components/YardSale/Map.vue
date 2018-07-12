<template>
  <l-map :minZoom="5" :style="style" :zoom="zoom" :center="center">
    <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
    <l-marker v-for="marker in mySearchGarage" :key="marker.id" :lat-lng="marker.location"></l-marker>
  </l-map>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {

  data(){
    return {
      style: {
        height: '500px',
      },
      center: '',
      zoom: '',
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(37.6, -95.665),
    }
  },

  created() {
    this.center = this.$store.getters.getMapCenter;
    this.zoom = this.$store.getters.getMapZoom;
  },

  computed: {

    mySearchGarage() {
      return this.$store.getters.getSearchGarages;
    },

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
