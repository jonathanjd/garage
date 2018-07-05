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

export default {
  data() {
    return {
      types: [],
      title: '',
      description: '',
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
      inputEndHour: false
    };
  },

  created() {
    this.$store.dispatch('loadTypeGarages');
    this.startDate = this.$moment().format('DD MMM YYYY');
    this.endDate = this.$moment().format('DD MMM YYYY');
    this.baseHour = hours;
  },

  computed: {

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
      return this.title == ''|| this.description == '' || this.myDataPicker1 == true || this.myDataPicker2 == true || this.inputStartHour == true || this.inputEndHour == true || this.validateTitle == true || this.validateDescription == true;
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
    Datepicker
  },

  methods: {

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
      const data = {
        title: this.title,
        description: this.description,
        type: this.type,
        startDate: this.$moment(this.startDate).format('YYYY-MM-DD'),
        endDate: this.$moment(this.endDate).format('YYYY-MM-DD'),
        startHour: this.$moment(this.startHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
        endHour: this.$moment(this.endHour, 'HH:mm a').format('YYYY-MM-DD HH:mm:ss'),
      };

      this.$store.dispatch('loadGarageDataBasic', data);
      EventBus.$emit('changeComponent', 'appSalePhotos', '70%');
    },

    cancel() {
      EventBus.$emit('changeComponent', 'appSaleLocation', '20%');
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
