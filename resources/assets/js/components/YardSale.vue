<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <app-search></app-search>
      </div>
      <div class="col-md-12">
        <div class="card mt-1">
          <div class="card-body">
            <div v-if="showMap">
              <app-map></app-map>
            </div>
            <div v-else>
              <vue-loading type="balls" color="#007BFF" :size="{ width: '50px', height: '50px' }"></vue-loading>
            </div>
          </div>
        </div>
      </div><!-- .col-md-12 -->
      <div class="col-md-12 mt-1" v-if="myResultsSearch > 0">

        <div class="card-columns">

          <div class="card" v-for="garage in myGarages" :key="garage.id">
            <img class="card-img-top" :src="`../img/photos/${garage.images[0].name}`" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ garage.title }}</h5>
              <p class="card-text"></p><strong>Address:</strong> {{ garage.address }}</p>
              <p class="card-text"></p><strong>Hour:</strong> {{ $moment(garage.starthour, 'HH:mm:ss').format('HH:mm a') }} - {{ $moment(garage.endhour , 'HH:mm:ss').format('HH:mm a')}} </p>
              <p>
                <span v-for="tag in garage.tags" :key="tag.id" class="badge badge-info mx-1">{{ tag.name }}</span>
              </p>
              <button type="button" @click="info(garage.id)" class="btn btn-primary btn-sm">More Info</button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</template>

<script>
import Map from './YardSale/Map';
import Search from './YardSale/Search';
import { VueLoading } from 'vue-loading-template'
export default {

  data() {
    return {
      showMap: true,
    }
  },

  created() {
    EventBus.$on('changeShowMap', (value) => {
      this.showMap = value;
    });
  },

  computed: {

    myGarages() {
      return this.$store.getters.getSearchGarages;
    },

    myResultsSearch() {
      return this.$store.getters.getSearchGarages.length;
    }
  },

  methods: {
    info(id){

    }
  },

  components: {
    appMap: Map,
    showMap: true,
    appSearch: Search,
    VueLoading
  }

}
</script>

<style>
</style>
