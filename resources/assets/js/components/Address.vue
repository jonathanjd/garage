<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card border-dark mt-2">
        <div class="card-body">
          <l-map :style="style" :zoom="zoom" :center="myCenter">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker v-for="garage in garages" :key="garage.id" :lat-lng="garage.location"></l-marker>
          </l-map>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card-columns mt-1">
        <div class="card" v-for="garage in garages" :key="garage.id">
          <img class="card-img-top" :src="`../img/photos/${garage.images[0].name}`" height="180">
          <div class="card-body">
            <h5 class="card-title">{{ garage.title }}</h5>
            <p class="card-text"></p><strong>Address:</strong> {{ garage.address }}</p>
            <p class="card-text"></p><strong>Hour:</strong> {{ $moment(garage.starthour, 'HH:mm:ss').format('HH:mm a') }} - {{ $moment(garage.endhour , 'HH:mm:ss').format('HH:mm a')}} </p>
            <p>
              <span v-for="tag in garage.tags" :key="tag.id" class="badge badge-info mx-1">{{ tag.name }}</span>
            </p>
            <button type="button" @click="info(garage.id)" class="btn btn-primary btn-sm">More Info</button>
            <button type="button" @click="location(garage.lat, garage.lng)" class="btn btn-dark btn-sm">Location</button>
          </div>
        </div><!-- .card -->
      </div><!-- .card-columns -->
    </div>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {
  data() {
    return {
      garages: {},
      myGarage: [],
      style: {
        height: '500px'
      },
      zoom: 12,
      center: [36.116203, -119.681564],
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      marker: L.latLng(47.41322, -1.219482)
    };
  },

  created() {
    this.fetchGarages();
  },

  computed: {
    myCenter() {
      return this.center;
    }
  },

  props: ['address'],

  methods: {
    info(id) {
      window.location.replace(window.location.origin + '/show/' + id);
    },

    location(lat, lng) {
      this.center = [lat, lng];
      this.zoom = 16;
      window.scroll(0, 0);
    },

    fetchGarages() {
      axios
        .get(`/api/address/${this.address}`)
        .then(res => {
          if (!res.data === false) {
            this.garages = res.data;
            this.center = [this.garages[0].lat, this.garages[0].lng];
          } else {
          }
        })
        .catch(() => {
          console.log('Error Api');
        });
    }
  },

  components: {
    LMap,
    LTileLayer,
    LMarker
  }
};
</script>

<style>
@import '~leaflet/dist/leaflet.css';
</style>
