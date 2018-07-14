<template>
  <div class="card">
    <div class="card-header">
      <h3>Search Garage Sale</h3>
    </div>
    <div class="card-body">
      <form class="form-inline justify-content-center">
        <input type="text" name="search" v-model="search" class="form-control form-control-lg mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Address or Zip Code">
        <button @click.prevent="buscar" class="btn btn-outline-primary mb-2">Search</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {

  data(){
    return {
      search: '',
    }
  },

  props: ['myfetchGarageSearch'],

  methods: {
    buscar() {
      if (this.search != "") {
        this.myfetchGarageSearch(this.search);
        this.search = "";
      }
    }
  }

};
</script>

<style>
</style>
