<template>
  <div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
    <div class="card bg-light">
      <div class="card-body">
        <h5 class="text-center">City and State or Zipcode</h5>
        <div class="row">
          <div class="col">
            <div class="input-group">
              <select v-model="formSearch.type" class="form-control">
                <option value="0" selected>City and State</option>
                <option value="1">ZipCode</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="input-group">
              <input type="text" class="form-control" :placeholder="myPlacerHolderSearch" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button"><font-awesome-icon :icon="myIcon" /></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faSearch } from '@fortawesome/free-solid-svg-icons'
  export default {

    data () {
      return {
        myIcon: faSearch,
        formSearch: {
          type: '0',
        }
      }
    },

    computed: {
      myPlacerHolderSearch() {
        return this.formSearch.type == '0' ? 'Example: Savannah, GA' : 'Example: 31405';
      }
    },

    components: {
      FontAwesomeIcon
  }
  }
</script>

<style>
</style>