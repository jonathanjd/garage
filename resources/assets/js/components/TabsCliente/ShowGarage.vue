<template>
  <div class="card border-secondary mb-3">
    <div class="card-header"><a href="">{{ myGarage.title }}</a></div>
    <div class="card-body text-secondary">
      <h5 class="card-title"></h5>
      <p class="card-text">{{ myLocationInfo }}</p>
      <p><strong>Date:</strong> {{ myDateInfo }}</p>
      <p><strong>Hour:</strong> {{ myHourInfo }}</p>
      <div class="text-right">
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
      return `${this.myGarage.postal} ${this.myGarage.address}, ${this.myGarage.city}, ${this.myGarage.state}`
    },

    myDateInfo() {
      return `${this.$moment(this.myGarage.startdate, 'YYYY-MM-DD').format('DD MMM YYYY')} to ${this.$moment(this.myGarage.enddate, 'YYYY-MM-DD').format('DD MMM YYYY')}`;
    },

    myHourInfo() {
      return `${this.$moment(this.myGarage.starthour, 'HH:mm:ss').format('HH:mm a')} to ${this.$moment(this.myGarage.endhour, 'HH:mm:ss').format('HH:mm a')}`;
    }
  },

  methods: {
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
