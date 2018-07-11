<template>
  <div>
    <transition-group name="fade" appear>
      <div class="mt-4" key="box1">
        <h3>We need your address to get started.</h3>
        <p>Please enter the address of your sale in the form below and click Search. Once verified, click Next to proceed.</p>
        <app-message v-if="showMessage" :myTitle="messageProps.title" :myTypeAlert="messageProps.type"></app-message>
      </div>
      <div class="card border-primary mt-4" key="box2">
        <div class="card-body">
          <h4>Sale Location</h4>
          <form>
            <div class="form-row">
              <div class="col">
                <input type="text" v-model="formData.address" class="form-control" placeholder="Address">
              </div>
              <div class="col">
                <input type="text" v-model="formData.city" class="form-control" placeholder="City">
              </div>
              <div class="col">
                <select class="form-control" v-model="formData.state" id="exampleFormControlSelect1">
                  <option value="selected" disabled selected>State</option>
                  <option v-for="state in listState" :value="state.id">{{ state.code }}</option>
                </select>
              </div>
              <div class="col">
                <input type="text" v-model="formData.postalCode" class="form-control" placeholder="Postal Code">
              </div>
            </div>
            <button class="btn btn-primary my-4" @click.prevent="search" :disabled="validateSearch">Search</button>
          </form>
        </div>
      </div>
      <div class="card border-primary mt-4" v-if="showRefineLocation" key="box3">
        <div class="card-body">
          <h4>Refine Location</h4>
          <p>Is the location of the sale correct on the map below? If not, please drag the marker to the correct location.</p>
          <app-map :myLocationSearch="locationSearch"></app-map>
          <button @click="next" class="btn btn-primary mt-2">Next</button>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
import states from '../../data/states.js';
import Message from '../alert/Message';
import Map from './Map';
export default {
  data(){
    return{
      formData: {
        address: null,
        city: null,
        state: 'selected',
        postalCode: null
      },
      locationSearch: null,
      myStates: states,
      showRefineLocation: false,
      showMessage: false,
      messageProps: {
        title: null,
        type: null
      }
    }
  },

  created() {
    EventBus.$on('destroyMessage', () => {
      this.showMessage = false;
    });

    this.$store.dispatch('loadListState');
  },

  computed: {
    validateSearch() {
      return this.formData.address == '' || this.formData.city == '' || this.formData.postalCode == '' || this.formData.state == 'selected';
    },

    listState() {
      return this.$store.getters.getlistState;
    }
  },

  mounted() {
    //this.locationTest();
  },

  methods: {

    next(){
      EventBus.$emit('changeComponent', 'appSaleDetails', '20%');
      this.$store.dispatch('loadGarageLocationBasic', this.formData);
    },

    search() {

      let geocoder = new google.maps.Geocoder();
      this.geocodeAddress(geocoder);

    },

    locationTest(){
      this.formData.address = '3046  Duke Lane';
      this.formData.city = 'Red Bank';
      this.formData.state = 31;
      this.formData.postalCode = '07701';
    },

    geocodeAddress(geocoder) {

      let address = `${this.formData.address} ${this.formData.city} ${this.formData.state} ${this.formData.postalCode}`;
      let location;
        geocoder.geocode({'address': address}, (results, status) => {
          if (status === 'OK') {
            this.locationSearch = results[0].geometry.location;
            this.showRefineLocation = true;
          } else {
            this.messageProps.title = 'Geocode was not successful for the following reason: ' + status;
            this.messageProps.type = 'alert-danger';
            this.showMessage = true;
          }
        });
    }
  },

  components: {
    appMap: Map,
    appMessage: Message
  }

}
</script>

<style>
</style>
