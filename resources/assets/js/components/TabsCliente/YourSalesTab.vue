<template>
  <div
        class="tab-pane fade show active"
        id="yourSale"
        role="tabpanel"
        aria-labelledby="your-sales"
      >
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-4">
              <div class="card-body">

                <h3>Your Sales</h3>

                <app-show-garage v-for="garage in myGaragesByUser" :key="garage.id" :myGarage="garage"></app-show-garage>

                <p>You do not have any sales scheduled.</p>
                <button @click="showSaleManage" class="btn btn-success">Add Sale</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>

import ShowGarage from './ShowGarage'

export default {


  computed: {
    myGaragesByUser() {
      return this.$store.getters.getGarageByUser;
    }
  },

  created(){
    this.garagesByUser();
  },

  methods: {
    showSaleManage() {
      EventBus.$emit('changeMyDashboard');
    },

    garagesByUser(){
      this.$store.dispatch('loadGarageByUser');
    }
  },

  components: {
    appShowGarage: ShowGarage
  }

}
</script>

<style>
</style>
