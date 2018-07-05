<template>
<div>
  <transition-group name="fade" appear>
    <div class="mt-4" key="box1">
      <h3>Sale Summary</h3>
      <hr>
      <h5>{{ myGarage.title }}</h5>
      <h6>Description:</h6>
      <p>{{ myGarage.description }}</p>
      <div class="row">
        <div class="col">
          <p><strong>Start Date:</strong> {{ myGarage.startDate }}</p>
        </div>
        <div class="col">
          <p><strong>End Date:</strong> {{ myGarage.endDate }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p><strong>Start Hour:</strong> {{ myGarage.startHour }}</p>
        </div>
        <div class="col">
          <p><strong>End Hour:</strong> {{ myGarage.endHour }}</p>
        </div>
      </div>
      <h3>My Photos</h3>
      <hr>
    </div>
  </transition-group>
  <div class="mt-4">
    <button @click="saveGarage" type="button" class="btn btn-success btn-block"><font-awesome-icon :icon="myIconSave" /> Save Garage</button>
  </div>
</div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faSave } from '@fortawesome/free-solid-svg-icons'
export default {

  data(){
    return {
      myGarage:{},
      myIconSave: faSave
    }
  },

  created(){
    this.myGarage = this.$store.getters.getGarageData;
  },

  methods: {
    saveGarage(){
      const data = {
        address: this.myGarage.address,
        city: this.myGarage.city,
        state: this.myGarage.state,
        postal: this.myGarage.postal,
        lat: this.myGarage.location.lat,
        lng: this.myGarage.location.lng,
        title: this.myGarage.title,
        description: this.myGarage.description,
        startdate: this.myGarage.startDate,
        enddate: this.myGarage.endDate,
        starthour: this.myGarage.startHour,
        endhour: this.myGarage.endHour,
        type_garage_id: this.myGarage.type
      };

      axios.post('/admin/api/garage', data).then(() =>{
        console.log('Save Garage');
      }).catch(() => {
        console.log('Error');
      });

    }
  },

  components: {
    FontAwesomeIcon,
  }

}
</script>

<style>
</style>
