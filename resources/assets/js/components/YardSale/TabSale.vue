<template>
  <div class="tab-pane fade" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
    <div class="card bg-light">
      <div class="card-body">
        <h5 class="text-center">Garage Sale</h5>
        <p class="text-center"><strong>{{ showMyWeek }}</strong></p>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <div class="btn-group hidden-xs" role="group">
                <button @click="chanceButton('all')" type="button" data-toggle="button" :class="[btnAll ? 'btn btn-success' : 'btn btn-secondary']">*</button>
                <button @click="chanceButton('Sun')" type="button" data-toggle="button" :class="[btnSun ? 'btn btn-success' : 'btn btn-secondary']">Sun</button>
                <button @click="chanceButton('Mon')" type="button" data-toggle="button" :class="[btnMon ? 'btn btn-success' : 'btn btn-secondary']">Mon</button>
                <button @click="chanceButton('Tues')" type="button" data-toggle="button" :class="[btnTues ? 'btn btn-success' : 'btn btn-secondary']">Tues</button>
                <button @click="chanceButton('Wed')" type="button" data-toggle="button" :class="[btnWed ? 'btn btn-success' : 'btn btn-secondary']">Wed</button>
                <button @click="chanceButton('Thurs')" type="button" data-toggle="button" :class="[btnThurs ? 'btn btn-success' : 'btn btn-secondary']">Thurs</button>
                <button @click="chanceButton('Fri')" type="button" data-toggle="button" :class="[btnFri ? 'btn btn-success' : 'btn btn-secondary']">Fri</button>
                <button @click="chanceButton('Sat')" type="button" data-toggle="button" :class="[btnSat ? 'btn btn-success' : 'btn btn-secondary']">Sat</button>
              </div>
            </div>
            <div class="form-group">
              <app-tags-input input-class="form-control" placeholder="Example: Books + Enter" :limit="4" :delete-on-backspace="true"></app-tags-input>
            </div>
            <button class="btn btn-primary">Search</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</template>

<script>
import TagsInput from '@voerro/vue-tagsinput';
export default {


  data(){
    return {
      dateWeek: null,
      btnAll: false,
      btnSun: false,
      btnMon: false,
      btnTues: false,
      btnWed: false,
      btnThurs: false,
      btnFri: false,
      btnSat: false,
    }
  },

  created() {
    this.dateWeek = this.$moment();
  },

  computed : {
    showMyWeek() {
      return `${this.dateWeek.startOf('week').format('D MMM YYYY')} to ${this.dateWeek.endOf('week').format('D MMM YYYY')}`;
    }
  },

  methods: {
    chanceButton(value){

      if (value === 'all') {
        this.btnAll = !this.btnAll
        this.btnSun = false;
        this.btnMon = false;
        this.btnTues = false;
        this.btnWed = false;
        this.btnThurs = false;
        this.btnFri = false;
        this.btnSat = false;
      }
      if (value === 'Sun') {
        this.btnSun = !this.btnSun
        this.btnAll = false
      }
      if (value === 'Mon') {
        this.btnMon = !this.btnMon
        this.btnAll = false
      }
      if (value === 'Tues') {
        this.btnTues = !this.btnTues
        this.btnAll = false
      }
      if (value === 'Wed') {
        this.btnWed = !this.btnWed
        this.btnAll = false
      }
      if (value === 'Thurs') {
        this.btnThurs = !this.btnThurs
        this.btnAll = false
      }
      if (value === 'Fri') {
        this.btnFri = !this.btnFri
        this.btnAll = false
      }
      if (value === 'Sat') {
        this.btnSat = !this.btnSat
        this.btnAll = false
      }

    }
  },

  components: {
    appTagsInput: TagsInput
  }

}
</script>

<style>
</style>
