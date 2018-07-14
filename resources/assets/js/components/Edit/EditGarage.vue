<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ title }} #0000{{ garageId }}</div><!-- .card-header -->

        <div class="card-body">

          <div class="text-right">
            <button @click="back" class="btn btn-primary">Back</button>
          </div>

          <component :is="componentId"></component>

        </div><!-- card-body -->

      </div><!-- card border-primary -->
    </div><!-- .col-md-12 -->
  </div><!--  .row -->
</template>

<script>

import MyLocation from './Location'
import MyDetail from './Detail'
import MyPhotos from './Photos'
import MySummary from './Summary';

export default {

  data(){
    return {
      title: 'Edit Garage',
      componentId: 'appLocation',
      garageId: null
    }
  },

  created() {
    this.listen();
    this.garageId = this.$store.getters.getGarageId;
  },

  methods: {

    listen() {
      EventBus.$on('changeComponentId', (value) => {
        this.componentId = value;
      });
    },

    back() {
      EventBus.$emit('editGarage', false);
      EventBus.$emit('showMyDashboard');
    }
  },

  components: {
    appLocation: MyLocation,
    appDetail: MyDetail,
    appPhotos: MyPhotos,
    appSummary: MySummary
  }

}
</script>

<style>
</style>
