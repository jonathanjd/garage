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
          <p><strong>Start Date:</strong> {{ myFormatDateStart }}</p>
        </div>
        <div class="col">
          <p><strong>End Date:</strong> {{ myFormatDateEnd }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p><strong>Start Hour:</strong> {{ myFormatHourStart }}</p>
        </div>
        <div class="col">
          <p><strong>End Hour:</strong> {{ myFormatHourEnd }}</p>
        </div>
      </div>
      <p>
        <strong>Location:</strong> {{ myLocationInfo }}
      </p>
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
      myIconSave: faSave,
      myForm: new FormData,
    }
  },

  props: ['urlCurrent'],

  computed: {
    myFormatDateStart(){
      return `${this.$moment(this.myGarage.startDate, 'YYYY-MM-DD').format('DD MMM YYYY')}`
    },
    myFormatDateEnd(){
      return `${this.$moment(this.myGarage.startDate, 'YYYY-MM-DD').format('DD MMM YYYY')}`
    },
    myFormatHourStart(){
      return `${this.$moment(this.myGarage.startHour, 'YYYY-MM-DD HH:mm:ss').format('HH:mm a')}`
    },
    myFormatHourEnd(){
      return `${this.$moment(this.myGarage.endHour, 'YYYY-MM-DD HH:mm:ss').format('HH:mm a')}`
    },
    myLocationInfo(){
      return `${this.myGarage.postal} ${this.myGarage.address}, ${this.myGarage.city}, ${this.myGarage.state}`;
    },
    myUserActive(){
      return this.$store.getters.getUserActive;
    }
  },

  created(){
    this.myGarage = this.$store.getters.getGarageData;
  },

  methods: {
    saveGarage(){

      let data = {};

      if (this.myUserActive) {

          this.myForm.append('address', this.myGarage.address);
          this.myForm.append('city', this.myGarage.city);
          this.myForm.append('state', this.myGarage.state);
          this.myForm.append('postal', this.myGarage.postal);
          this.myForm.append('lat', this.myGarage.location.lat);
          this.myForm.append('lng', this.myGarage.location.lng);
          this.myForm.append('title', this.myGarage.title);
          this.myForm.append('description', this.myGarage.description);
          this.myForm.append('photos', this.myGarage.photos);
          this.myForm.append('startdate', this.myGarage.startDate);
          this.myForm.append('enddate', this.myGarage.endDate);
          this.myForm.append('starthour', this.myGarage.startHour);
          this.myForm.append('endhour', this.myGarage.endHour);
          this.myForm.append('type_garage_id', this.myGarage.type);

          for(let i=0; i < this.myGarage.photos.length; i++){
            this.myForm.append('photos[]',this.myGarage.photos[i]);
          }

         let config = {
            headers: { 'Content-Type': 'multipart/form-data' }
          };

          axios.post('/admin/api/garage', this.myForm, config).then(() =>{

          if (this.urlCurrent != undefined) {
            EventBus.$emit('changeGarageSuccess')
          }else {
            this.$store.dispatch('loadAlertMessageTitle', 'Garage Saved');
            this.$store.dispatch('loadAlertMessageType', 'alert-success');
            this.$store.dispatch('loadAlertMessageShow', true);
            EventBus.$emit('showMyDashboard');
          }

        }).catch(() => {
          console.log('Error');
        });

      } else {
          data = {
          name: this.$store.getters.getNewUser.name,
          email: this.$store.getters.getNewUser.email,
          password: this.$store.getters.getNewUser.password,
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

        axios.post('/api/garage', data).then(() =>{

          if (this.urlCurrent != undefined) {
            EventBus.$emit('changeGarageSuccess')
          }else {
            this.$store.dispatch('loadAlertMessageTitle', 'Garage Saved');
            this.$store.dispatch('loadAlertMessageType', 'alert-success');
            this.$store.dispatch('loadAlertMessageShow', true);
            EventBus.$emit('showMyDashboard');
          }

        }).catch(() => {
          console.log('Error');
        });

        }

    }
  },

  components: {
    FontAwesomeIcon,
  }

}
</script>

<style>
</style>
