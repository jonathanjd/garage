<template>
<div>
  <div class="google-map" :id="mapName"></div>
</div>
</template>

<script>
export default {

  data(){
    return {
      mapName: 'map',
      marker: null,
      lat: null,
      lng: null
    }
  },

  props: ['myLocationSearch'],

  mounted() {
    const element = document.getElementById(this.mapName)
    const options = {
      zoom: 18,
      center: this.myLocationSearch,
      mapTypeId: 'satellite',
      mapTypeId: google.maps.MapTypeId.HYBRID
    }
    const map = new google.maps.Map(element, options);

    this.marker = new google.maps.Marker({
      position: this.myLocationSearch,
      draggable: true,
      animation: google.maps.Animation.DROP,
      map:map,
      title:"Drag Me!"
    });

    this.$store.dispatch('loadGarageLocationLat',this.marker.getPosition().lat());
    this.$store.dispatch('loadGarageLocationLng',this.marker.getPosition().lng());

    google.maps.event.addListener(this.marker, 'dragend', (event) => {
      this.$store.dispatch('loadGarageLocationLat',event.latLng.lat());
      this.$store.dispatch('loadGarageLocationLng',event.latLng.lng());
    });

  },

}
</script>

<style>
.google-map {
  width: 800px;
  height: 600px;
  margin: 0 auto;
  background: gray;
}
</style>
