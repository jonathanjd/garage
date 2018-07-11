<template>
  <div>
    <div class="row">
      <div class="col my-4">
        <l-map :style="style" :zoom="zoom" :center="center">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="marker"></l-marker>
          </l-map>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5 class="card-title text-primary">{{ myGarage.title }}</h5>
        <p class="card-text">{{ myGarage.description }}</p>
        <p>
          <span class="badge badge-info text-uppercase mx-1" v-for="tag in myGarage.tags" :key="tag.id">
            {{ tag.name }}
          </span>
        </p>
        <p v-if="myGarage.state">
          <strong>Location:</strong> {{ myGarage.address }} {{ myGarage.postal }}, {{ myGarage.city }}, {{ myGarage.state.name  }}</p>
        <p>
          <strong>Start Date:</strong> {{ this.$moment(myGarage.startdate, 'YYYY-MM-DD').format('DD MMM YYYY') }}</p>
        <p>
          <strong>End Date:</strong> {{ this.$moment(myGarage.enddate, 'YYYY-MM-DD').format('DD MMM YYYY') }}</p>
        <p>
          <strong>Hour: </strong>{{ this.$moment(myGarage.starthour, 'HH:mm:ss').format('HH:mm a') }} - {{ this.$moment(myGarage.endhour , 'HH:mm:ss').format('HH:mm a')}}</p>
        <h6 class="text-primary text-center">Photos</h6>
        <hr>
        <div class="row">
          <div class="col-md-4" v-for="photo in myGarage.images">
            <img :src="`../img/photos/${photo.name}`" alt="" height="200" width="200" class="img-thumbnail">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
  export default {

    data(){
      return {
        myGarage: [],
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

    props: ['id'],

    created() {
      this.fetchGarage();
    },


    methods: {
      fetchGarage(){
        axios.get(`/api/garage/show/${this.id}`).then( res => {
          this.myGarage = res.data;
          this.center = [this.myGarage.lat, this.myGarage.lng];
          this.marker = L.latLng(this.myGarage.lat, this.myGarage.lng);
        }).catch( () => {
          console.log('Error');
        });
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