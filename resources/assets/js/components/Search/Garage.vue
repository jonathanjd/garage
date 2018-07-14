<template>
  <div class="card">
    <img class="card-img-top" :src="`../img/photos/${myData.images[0].name}`" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ myData.title }}</h5>
      <p class="card-text"></p><strong>Address:</strong> {{ myData.address }}</p>
      <p class="card-text"></p><strong>Hour:</strong> {{ $moment(myData.starthour, 'HH:mm:ss').format('HH:mm a') }} - {{ $moment(myData.endhour , 'HH:mm:ss').format('HH:mm a')}} </p>
      <p>
        <span v-for="tag in myData.tags" :key="tag.id" class="badge badge-info mx-1">{{ tag.name }}</span>
      </p>
      <button type="button" @click="info(myData.id)" class="btn btn-primary btn-sm">More Info</button>
    </div>
  </div>
</template>

<script>
export default {

  props: ['myData'],

  methods: {
    info(id) {
      window.location.replace(window.location.origin + '/show/' + id);
    },
  }

}
</script>

<style>
</style>
