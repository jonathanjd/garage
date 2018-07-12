<template>
  <div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
    <div class="card bg-light">
      <div class="card-body">
        <h5 class="text-center">Address or Zipcode</h5>
        <div v-if="messageShow"  class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>Garage Sale!</strong> {{ messageText }}.
          <button @click="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row">
          <div class="col">
            <div class="input-group">
              <select v-model="formSearch.type" class="form-control">
                <option value="0" selected>Address</option>
                <option value="1">ZipCode</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="input-group">
              <input v-model="formSearch.value" type="text" class="form-control" :placeholder="myPlacerHolderSearch" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button @click="search()" class="btn btn-outline-primary" type="button"><font-awesome-icon :icon="myIcon" /></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';
export default {
  data() {
    return {
      myIcon: faSearch,
      messageShow: false,
      messageText: 'No Hay Resultado',
      formSearch: {
        type: '0',
        value: null
      }
    };
  },

  computed: {
    myPlacerHolderSearch() {
      return this.formSearch.type == '0' ? 'Example: Agoura Hills' : 'Example: 91301';
    }
  },

  methods: {

    close() {
      this.messageShow = false;
    },

    search() {
      EventBus.$emit('changeShowMap', false);
      if (this.formSearch.type === '0') {
        this.$store.dispatch('loadSearchAddress', this.formSearch.value).then( () => {

          const lat = this.$store.getters.getSearchGarages[0].lat;
          const lng = this.$store.getters.getSearchGarages[0].lng;
          this.$store.dispatch('loadMapCenter', [lat, lng]);
          this.$store.dispatch('loadMapZoom', 12);
          EventBus.$emit('changeShowMap', true);

       }).catch(() => {
         this.messageShow = true;
         this.messageText = `There are no results matching your search: ${this.formSearch.value}`;
         EventBus.$emit('changeShowMap', true);
       });
      }
      if (this.formSearch.type === '1') {
       this.$store.dispatch('loadSearchPostal', this.formSearch.value).then( () => {
          const lat = this.$store.getters.getSearchGarages[0].lat;
          const lng = this.$store.getters.getSearchGarages[0].lng;
          this.$store.dispatch('loadMapCenter', [lat, lng]);
          this.$store.dispatch('loadMapZoom', 12);
          EventBus.$emit('changeShowMap', true);
       }).catch( () => {
         this.messageShow = true;
         this.messageText = `There are no results matching your search: ${this.formSearch.value}`;
         EventBus.$emit('changeShowMap', true);
       });
      }
    },

  },

  components: {
    FontAwesomeIcon
  }
};
</script>

<style>
</style>
