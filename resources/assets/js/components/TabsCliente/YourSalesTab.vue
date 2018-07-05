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
                <app-message v-if="showAlertMessage" :myTitle="miAlertMessageTitle" :myTypeAlert="miAlertMessageType"></app-message>
                <h3>Your Sales</h3>

                <transition-group name="fadeUp" appear>
                  <app-show-garage v-for="garage in myGaragesByUser" :key="garage.id" :myGarage="garage"></app-show-garage>
                </transition-group>

                <p v-if="myGaragesByUser.length == 0">You do not have any sales scheduled.</p>
                <button @click="showSaleManage" class="btn btn-success">Add Sale</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>

import ShowGarage from './ShowGarage'
import Message from '../alert/Message';
export default {

  data() {
    return {

    }
  },

  computed: {
    myGaragesByUser() {
      return this.$store.getters.getGarageByUser;
    },

    showAlertMessage() {
      return this.$store.getters.getAlertMessageShows;
    },

    miAlertMessageTitle() {
      return this.$store.getters.getAlertMessageTitle;
    },

    miAlertMessageType() {
      return this.$store.getters.getAlertMessageType;
    },
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
    appShowGarage: ShowGarage,
    appMessage: Message
  }

}
</script>

<style>
</style>
