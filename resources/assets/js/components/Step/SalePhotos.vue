<template>
<div>
  <transition-group name="fade" appear>
    <div class="mt-4" key="box1">
      <h3>Add photos to your listing (up to 5 photos)</h3>
      <p>Click the button below to select and upload photos. Sales with photos get preferred treatment on our site because buyers love to get a preview of what will be at the sale. If you aren't ready to add photos right now, you can always come back and add photos later.</p>
    </div>
    <div class="card border-primary mt-4" key="box2">
        <div class="card-body">
          <h4>Add Photos</h4>

          <div class="form-group">
            <label for="">Upload Photos</label>
            <input type="file" class="form-control" multiple @change="getFiles">
          </div>

        </div>
    </div>
  </transition-group>
  <div class="mt-4">
    <button @click="cancel" class="btn btn-outline-dark">Cancel</button>
    <button @click="next" class="btn btn-primary">Next</button>
  </div>
</div>
</template>

<script>

export default {

  data(){
    return {
      files: [],
      form: new FormData
    }
  },

  computed: {
    multiImageUrl(){
      return this.files.length > 0;
    }
  },

  methods: {

    getFiles(e) {
      console.log('hola')
      let selectedFiles = e.target.files;
      if (!selectedFiles.length) {
        return false;
      }

    for (let index = 0; index < selectedFiles.length; index++) {

      this.files.push(selectedFiles[index]);

    }

    console.log(this.files)

    },



    next(){

      this.$store.dispatch('loadGaragePhotos', this.files);
      EventBus.$emit('changeComponent', 'appSaleSumamry', '100%');

    },

    cancel(){
      EventBus.$emit('changeComponent', 'appSalePhotos', '70%');
    }
  },


}
</script>

<style>
</style>
