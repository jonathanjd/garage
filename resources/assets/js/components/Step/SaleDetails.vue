<template>
<div>
  <transition-group name="fade" appear>
    <div class="mt-4" key="box1">
      <h3>Enter your sale details</h3>
      <p>Try to list as many items as you can in the description. When buyers search for sales with certain items like "bike" or "tools", your sale will only appear if you add those words to your description. Then click Next to proceed to the Photos step.</p>
    </div>
    <div class="card border-primary mt-4" key="box2">
        <div class="card-body">
          <h4>Sale Details</h4>
            <div class="form-group">
              <label for="">Type</label>
              <select class="form-control" v-model="type">
                <option :value="type.id" v-for="type in myTypeGarages">{{ type.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Title</label>
              <input v-model="title" :class="[validateTitle ? 'form-control is-invalid':'form-control']" type="text">
              <div v-if="validateTitle" class="invalid-data">Maximum 100 Characters Are Allowed</div>
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea v-model="description" :class="[validateDescription ? 'form-control is-invalid':'form-control']"></textarea>
              <div v-if="validateDescription" class="invalid-data">Maximum 2000 Characters Are Allowed</div>
            </div>
            <div class="form-group">
              <label for="">Tags</label>
              <app-tags-input element-id="tags" v-model="selectedTags" input-class="form-control" placeholder="Example: Books + Enter" :limit="4" :delete-on-backspace="true"></app-tags-input>
              <small id="emailHelp" class="form-text text-muted">Whether deleting tags by pressing Backspace(<font-awesome-icon :icon="myIcon"></font-awesome-icon>) is allowed.</small>
            </div>
        </div>
    </div>
    <div class="card border-primary mt-4" key="box3">
        <div class="card-body">
          <h4>Date & Times</h4>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Start Date</label>
                <datepicker @closed="validateDatePicker1" name="datepicker1" v-model="startDate" :input-class="[myDataPicker1 ? 'form-control is-invalid' : 'form-control']" :value="startDate"></datepicker>
                <div v-if="showDatapicker1" class="invalid-data">Invalid Date.</div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">End Date</label>
                <datepicker @closed="validateDatePicker2" name="datepicker2" v-model="endDate" :input-class="[myDataPicker2 ? 'form-control is-invalid' : 'form-control']" :value="endDate"></datepicker>
                <div v-if="showDatapicker2" class="invalid-data">Invalid Date.</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Start Hour</label>
                <select @change="validateHourStart" v-model="startHour" :class="[showInputStartHour ? 'form-control is-invalid' : 'form-control']">
                  <option :value="hour" v-for="(hour, index) in baseHour">{{ hour }}</option>
                </select>
                <div v-if="showInputStartHour" class="invalid-data">Invalid Hour.</div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">End Hour</label>
                <select @change="validateHourEnd" v-model="endHour" :class="[showInputEndHour ? 'form-control is-invalid' : 'form-control']">
                  <option :value="hour" v-for="(hour, index) in baseHour">{{ hour }}</option>
                </select>
                <div v-if="showInputEndHour" class="invalid-data">Invalid Hour.</div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div v-if="!showNewUser" class="card border-primary mt-4" key="box4">
      <div class="card-body">
        <h4>New User</h4>
        <app-message v-if="showAlertMessage" :myTitle="miAlertMessageTitle" :myTypeAlert="miAlertMessageType"></app-message>
        <div class="form-group">
          <label for="">Name</label>
          <input data-vv-name="name" :class="[errors.has('name') ? 'form-control is-invalid': 'form-control']" v-validate="{ required: true, max:255 }" type="text" v-model="newUserForm.name">
          <div class="invalid-data" v-if="errors.has('name')">
            {{errors.first('name')}}
          </div>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input data-vv-name="email" :class="[errors.has('email') ? 'form-control is-invalid': 'form-control']" v-validate="{ required: true, email: true }" type="email" v-model="newUserForm.email">
          <div class="invalid-data" v-if="errors.has('email')">
            {{errors.first('email')}}
          </div>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input data-vv-name="password" :class="[errors.has('password') ? 'form-control is-invalid': 'form-control']" v-validate="{ required: true, min:6 }" type="password" v-model="newUserForm.password">
          <div class="invalid-data" v-if="errors.has('password')">
            {{errors.first('password')}}
          </div>
        </div>
      </div>
    </div>
  </transition-group>
  <div class="mt-4">
    <button @click="cancel" class="btn btn-outline-dark">Cancel</button>
    <button @click="next" class="btn btn-primary" :disabled="validateNextBTN">Next</button>
  </div>
</div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import { hours } from '../../data/hours.js';
import Message from '../alert/Message';
import TagsInput from '@voerro/vue-tagsinput';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBackspace } from '@fortawesome/free-solid-svg-icons';

export default {
  data() {
    return {
      types: [],
      title: '',
      description: '',
      selectedTags: [],
      type: '1',
      startDate: '',
      endDate: '',
      startHour: '8:00 AM',
      endHour: '5:00 PM',
      diffDate: 0,
      baseHour: null,
      myDataPicker1: false,
      myDataPicker2: false,
      inputStartHour: false,
      inputEndHour: false,
      userActive: false,
      newUserForm: {
        name: '',
        email: '',
        password: ''
      },
      myIcon: faBackspace,
    };
  },

  created() {
    this.$store.dispatch('loadTypeGarages');
    this.startDate = this.$moment().format('DD MMM YYYY');
    this.endDate = this.$moment().format('DD MMM YYYY');
    this.baseHour = hours;
    this.userLogging();
  },

  computed: {

    showAlertMessage() {
      return this.$store.getters.getAlertMessageShows;
    },

    miAlertMessageTitle() {
      return this.$store.getters.getAlertMessageTitle;
    },

    miAlertMessageType() {
      return this.$store.getters.getAlertMessageType;
    },

    showNewUser(){
      return this.userActive;
    },

    validateTitle() {
      return this.title.length >= 100;
    },

    validateDescription() {
      return this.description.length >= 2000;
    },

    showInputStartHour() {
      return this.inputStartHour;
    },

    showInputEndHour() {
      return this.inputEndHour;
    },

    showDatapicker1() {
      return this.myDataPicker1;
    },

    showDatapicker2() {
      return this.myDataPicker2;
    },

    validateNextBTN(){
      return this.title == ''|| this.description == '' || this.myDataPicker1 == true || this.myDataPicker2 == true || this.inputStartHour == true || this.inputEndHour == true || this.validateTitle == true || this.validateDescription == true || this.selectedTags.length <= 0;
    },

    myTypeGarages(){
      return this.$store.getters.getTypeGarages;
    },

    myDiffDate() {
      let a = this.$moment(this.startDate);
      let b = this.$moment(this.endDate);
      return Math.abs(a.diff(b, 'days')) + 1;
    }
  },

  components: {
    Datepicker,
    appMessage: Message,
    appTagsInput: TagsInput,
    FontAwesomeIcon
  },

  methods: {

    userLogging() {

      axios.get('/api/search/user/logging').then( res => {
        this.userActive = res.data;
        this.$store.dispatch('loadUserActive', this.userActive);
      });

    },

    validateDatePicker1(){
      this.myDataPicker1 = false;
      this.myDataPicker2 = false;
      if (this.$moment(this.startDate,'DD MMM YYYY').isAfter(this.$moment(this.endDate, 'DD MMM YYYY'))) {
        this.myDataPicker1 = true;
      }
    },

    validateDatePicker2(){
      this.myDataPicker1 = false;
      this.myDataPicker2 = false;
      if (this.$moment(this.endDate,'DD MMM YYYY').isBefore(this.$moment(this.startDate, 'DD MMM YYYY'))) {
        this.myDataPicker2 = true;
      }
    },

    validateHourStart(){
      this.inputStartHour = false;
      this.inputEndHour = false;
      if (this.$moment(this.startHour,'HH:mm a').isAfter(this.$moment(this.endHour, 'HH:mm a'))) {
        this.inputStartHour = true;
      }
    },

    validateHourEnd(){
      this.inputStartHour = false;
      this.inputEndHour = false;
      if (this.$moment(this.endHour,'HH:mm a').isBefore(this.$moment(this.startHour, 'HH:mm a'))) {
        this.inputEndHour = true;
      }
    },

    next() {

      if (this.userActive) {
        const data = {
          title: this.title,
          description: this.description,
          tags: this.selectedTags,
          type: this.type,
          startDate: this.$moment(this.startDate).format('YYYY-MM-DD'),
          endDate: this.$moment(this.endDate).format('YYYY-MM-DD'),
          startHour: this.$moment(this.startHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
          endHour: this.$moment(this.endHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
        };

        this.$store.dispatch('loadGarageDataBasic', data);
        EventBus.$emit('changeComponent', 'appSalePhotos', '70%');

      } else {
        //New User
        if (this.$validator.validateAll()) {

          axios.get(`/api/search/user/email/verificar/${this.newUserForm.email}`).then( res => {

            if (res.data) {

              this.$store.dispatch('loadAlertMessageTitle', 'This Email Has Already Been Taken');
              this.$store.dispatch('loadAlertMessageType', 'alert-danger');
              this.$store.dispatch('loadAlertMessageShow', true);

            } else {

              const data = {
                title: this.title,
                description: this.description,
                tags: this.selectedTags,
                type: this.type,
                startDate: this.$moment(this.startDate).format('YYYY-MM-DD'),
                endDate: this.$moment(this.endDate).format('YYYY-MM-DD'),
                startHour: this.$moment(this.startHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
                endHour: this.$moment(this.endHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
              };

              const NEW_DATA = {
                name: this.newUserForm.name,
                email: this.newUserForm.email,
                password: this.newUserForm.password
              }

              this.$store.dispatch('loadNewUser', NEW_DATA);
              this.$store.dispatch('loadGarageDataBasic', data);
              EventBus.$emit('changeComponent', 'appSalePhotos', '70%');

            }

          });

        }
      }

    },

    cancel() {
      EventBus.$emit('changeComponent', 'appSaleLocation', '0%');
    }
  }
};
</script>

<style scoped>
.invalid-data {
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #dc3545;
}
</style>
