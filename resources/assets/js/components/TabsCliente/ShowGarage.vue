<template>
  <div class="card border-secondary mb-3">
    <div class="card-header">{{ myGarage.title }}</div>
    <div class="card-body text-secondary">
      <h5 class="card-title"></h5>
      <p class="card-text">{{ myLocationInfo }}</p>
      <p><strong>Date:</strong> {{ myDateInfo }}</p>
      <p><strong>Hour:</strong> {{ myHourInfo }}</p>
      <div class="text-right">
        <button @click="show" class="btn btn-info">Show</button>
        <button class="btn btn-warning">Edit</button>
        <button @click="destroy(myGarage.id)" class="btn btn-outline-danger">Delete</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  props: ['myGarage'],

  computed: {
    myLocationInfo() {
      return `${this.myGarage.postal} ${this.myGarage.address}, ${this.myGarage.city}, ${this.myGarage.state.name}`
    },

    myDateInfo() {
      return `${this.$moment(this.myGarage.startdate, 'YYYY-MM-DD').format('DD MMM YYYY')} to ${this.$moment(this.myGarage.enddate, 'YYYY-MM-DD').format('DD MMM YYYY')}`;
    },

    myHourInfo() {
      return `${this.$moment(this.myGarage.starthour, 'HH:mm:ss').format('HH:mm a')} to ${this.$moment(this.myGarage.endhour, 'HH:mm:ss').format('HH:mm a')}`;
    }
  },

  methods: {

    show(){

      const LOCATION = {
        address: this.myGarage.address,
        city: this.myGarage.city,
        postalCode: this.myGarage.postal,
        state: this.myGarage.state,
      };
      this.$store.dispatch('loadGarageLocationBasic', LOCATION);

      const LAT = this.myGarage.lat;

      this.$store.dispatch('loadGarageLocationLat', LAT);

      const LNG = this.myGarage.lng;

      this.$store.dispatch('loadGarageLocationLng', LNG);

      const DATABASIC = {
        title: this.myGarage.title,
        description: this.myGarage.description,
        tags: this.myGarage.tags,
        photos: this.myGarage.images,
        startDate: this.myGarage.startdate,
        endDate: this.myGarage.enddate,
        startHour: this.myGarage.starthour,
        endHour: this.myGarage.endhour,
      };

      this.$store.dispatch('loadGarageDataBasic', DATABASIC);

      EventBus.$emit('changeMyDashboard');
      EventBus.$emit('showGarage', true);
    },

    destroy(id) {
      axios.delete('/admin/api/garage/'.concat(id)).then( () => {

        this.$store.dispatch('loadAlertMessageTitle', 'Garage Deleted');
        this.$store.dispatch('loadAlertMessageType', 'alert-success');
        this.$store.dispatch('loadAlertMessageShow', true);
        this.$store.dispatch('loadGarageByUser');

      }).catch( error =>{
        console.log(error.response);
      });
    }
  },


}
</script>

<style>
</style>
