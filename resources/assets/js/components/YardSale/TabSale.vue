<template>
  <div class="tab-pane fade" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
    <div class="card bg-light">
      <div class="card-body">
        <h5 class="text-center">Garage Sale</h5>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Tags</label>
              <app-tags-input element-id="tags" v-model="selectedTags" input-class="form-control" placeholder="Example: Books + Enter" :limit="4" :delete-on-backspace="true"></app-tags-input>
              <small id="emailHelp" class="form-text text-muted">Whether deleting tags by pressing Backspace(<font-awesome-icon :icon="myIcon"></font-awesome-icon>) is allowed.</small>
            </div>
          </div>
          <div class="col">

            <div class="form-group">
                <label for="">Start Date</label>
                <datepicker calendar-button bootstrap-styling @closed="validateDatePicker1" name="datepicker1" v-model="startDate" :input-class="[myDataPicker1 ? 'form-control is-invalid' : 'form-control']" :value="startDate"></datepicker>
                <div v-if="showDatapicker1" class="invalid-data">Invalid Date.</div>
              </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="">End Date</label>
                <datepicker calendar-button bootstrap-styling @closed="validateDatePicker2" name="datepicker2" v-model="endDate" :input-class="[myDataPicker2 ? 'form-control is-invalid' : 'form-control']" :value="endDate"></datepicker>
                <div v-if="showDatapicker2" class="invalid-data">Invalid Date.</div>
              </div>
          </div>
        </div>

        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
  </div>
</template>

<script>
import TagsInput from '@voerro/vue-tagsinput';
import Datepicker from 'vuejs-datepicker';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBackspace } from '@fortawesome/free-solid-svg-icons';

export default {


  data(){
    return {
      selectedTags: [],
      startDate: '',
      endDate: '',
      myDataPicker1: false,
      myDataPicker2: false,
      myIcon: faBackspace,
      style: {
        position: "relative"
      }
    }
  },

  created() {
    this.startDate = this.$moment().format('DD MMM YYYY');
    this.endDate = this.$moment().format('DD MMM YYYY');
  },

  computed: {

    showDatapicker1() {
      return this.myDataPicker1;
    },

    showDatapicker2() {
      return this.myDataPicker2;
    },

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

  },

  components: {
    appTagsInput: TagsInput,
    Datepicker,
    FontAwesomeIcon
  }

}
</script>

<style>
.vdp-datepicker__calendar {
  z-index: 9000;
}
.invalid-data {
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #dc3545;
}
</style>
