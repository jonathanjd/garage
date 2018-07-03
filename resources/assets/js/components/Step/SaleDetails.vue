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
              <select class="form-control">
                <option :value="type" v-for="type in types">{{ type }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Title</label>
              <input class="form-control" type="text">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="card mt-4" key="box3">
        <div class="card-body">
          <h4>Date & Times</h4>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Start Date</label>
                <datepicker name="datepicker1" v-model="startDate" input-class="form-control" :value="startDate"></datepicker>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">End Date</label>
                <datepicker name="datepicker2" v-model="endDate" input-class="form-control" :value="endDate"></datepicker>
              </div>
            </div>
          </div>
        </div>
    </div>
  </transition-group>
</div>
</template>

<script>

import Datepicker from 'vuejs-datepicker';

export default {

  data() {
    return {
      types: ['Garage/Yard Sale', 'Moving Sale', 'Multi-family Sale', 'Estate Sale', 'Neighborhood Sale', 'Business', 'Other'],
      startDate:'',
      endDate: '',
    }
  },

  created() {
    this.startDate = this.$moment().format('YYYY MM DD');
    this.endDate = this.$moment().format('YYYY MM DD');
  },

  components: {
    Datepicker,
  }

}
</script>

<style>
</style>
