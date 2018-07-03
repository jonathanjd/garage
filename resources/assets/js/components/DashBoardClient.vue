<template>
  <div>
    <template v-if="showDashboard">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="your-sales"
            data-toggle="tab"
            href="#yourSale"
            role="tab"
            aria-controls="yourSale"
            aria-selected="true"
          >
            Your Sales
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="account-setting"
            data-toggle="tab"
            href="#accountSettings"
            role="tab"
            aria-controls="accountSettings"
            aria-selected="false"
          >
            Account Settings
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <app-account-settings></app-account-settings>
        <app-your-sales-tab></app-your-sales-tab>
      </div>
    </template>
    <template v-else>
      <app-sale-manage></app-sale-manage>
    </template>
  </div>
</template>

<script>
import AccountSettings from './TabsCliente/AccountSettings';
import YourSalesTab from './TabsCliente/YourSalesTab';
import SaleManage from './SaleManage';
export default {

  data(){
    return {
      myDashboard: true,
    }
  },

  created(){
    EventBus.$on('changeMyDashboard', () => {
      this.myDashboard = false;
    });
  },

  computed: {
    showDashboard() {
      return this.myDashboard;
    }
  },

  components: {
    appAccountSettings: AccountSettings,
    appYourSalesTab: YourSalesTab,
    appSaleManage: SaleManage
  }

}
</script>

<style>
</style>
