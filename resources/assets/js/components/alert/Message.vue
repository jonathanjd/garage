<template>
<div :class="`alert ${typeAlert} alert-dismissible fade show`" role="alert">
  <strong>Garage Sale</strong> {{ title }}.
  <button @click="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</template>

<script>
export default {

  data(){
    return {
      title: this.myTitle,
      typeAlert: this.myTypeAlert,
    }
  },

  props: {
    myTitle: {
      required: true,
      type: String,
    },

    myTypeAlert: {
      required: true,
      type: String,
      default: 'alert-success'
    }

  },


  methods: {
    close() {
      EventBus.$emit('destroyMessage');
      this.$store.dispatch('loadAlertMessageShow', false);
    }
  }

}
</script>

<style>
</style>
