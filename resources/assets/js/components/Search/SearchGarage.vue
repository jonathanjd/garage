<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <app-form-search :myfetchGarageSearch="fetchGarageSearch"></app-form-search>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card my-2">
          <div class="card-body">
            <app-map v-if="showMapa" :myGarages="garages"></app-map>
            <vue-loading v-else type="balls" color="#007BFF" :size="{ width: '50px', height: '50px' }"></vue-loading>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <app-garages :myGarages="garages"></app-garages>
      </div>
    </div>
  </div>
</template>

<script>
import FormSearch from './FormSearch';
import Map from './Map';
import Garages from './Garages';
import { VueLoading } from 'vue-loading-template'
export default {

  data() {
    return {
      garages: [],
      showMapa: true,
    }
  },

  props: ['search'],

  created() {

    if (this.search == "") {
      alert('Empty')
    } else {
      this.fetchGarageSearch(this.search);
    }

  },

  methods: {

    fetchGarageSearch(search) {
      this.showMapa = false;
      axios.get(`/api/search/garages/${search}`).then( res => {
        this.garages = res.data;
        this.showMapa = true;
      }).catch( () => {
        console.log('Error');
      });
    },

  },

  components: {
    appFormSearch: FormSearch,
    appMap: Map,
    appGarages: Garages,
    VueLoading
  }

}
</script>

<style>
</style>
