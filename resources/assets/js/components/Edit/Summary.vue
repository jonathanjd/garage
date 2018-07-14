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
    </div>
  </transition-group>
  <div class="mt-4">
    <div class="row">
      <div class="col">
        <button @click="cancel" class="btn btn-outline-dark btn-block">Cancel</button>
      </div>
      <div class="col">
        <button @click="updateGarage" type="button" class="btn btn-success btn-block"><font-awesome-icon :icon="myIconSave" /> Update Garage</button>
      </div>
    </div>
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
  },

  created(){
    window.scroll(0,0);
    this.myGarage = this.$store.getters.getGarageData;
  },

  methods: {

    cancel(){
      EventBus.$emit('changeComponentId', 'appPhotos');
    },

    updateGarage(){

      const dataForm = {
        address: this.myGarage.address,
        city: this.myGarage.city,
        state: this.myGarage.state,
        postal: this.myGarage.postal,
        lat: this.myGarage.location.lat,
        lng: this.myGarage.location.lng,
        title: this.myGarage.title,
        description: this.myGarage.description,
        tags: this.myGarage.tags,
        startdate: this.myGarage.startDate,
        enddate: this.myGarage.endDate,
        starthour: this.myGarage.startHour,
        endhour: this.myGarage.endHour,
        type_garage_id: this.myGarage.type,
      };

      const id = this.$store.getters.getGarageId;

      axios.put(`/admin/api/garage/${id}`, dataForm).then(() =>{

        this.myForm.append('photos', this.myGarage.photos);
        for(let i=0; i < this.myGarage.photos.length; i++){
          this.myForm.append('photos[]',this.myGarage.photos[i]);
        }
        let config = {
          headers: { 'Content-Type': 'multipart/form-data' }
        };
        axios.post(`/admin/garage/${id}/image`, this.myForm, config).then( () => {

          this.$store.dispatch('loadAlertMessageTitle', 'Garage Updated');
          this.$store.dispatch('loadAlertMessageType', 'alert-success');
          this.$store.dispatch('loadAlertMessageShow', true);
          EventBus.$emit('showMyDashboard');

        });

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
