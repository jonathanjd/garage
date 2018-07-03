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
                <p>You do not have any sales scheduled.</p>
                <button @click="showSaleManage" class="btn btn-success">Add Sale</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>

export default {

  methods: {
    showSaleManage() {
      EventBus.$emit('changeMyDashboard');
    }
  }

}
</script>

<style>
</style>
