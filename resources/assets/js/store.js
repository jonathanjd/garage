import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  // ...
  state: {
    garageData: {
      location: {
        lat: null,
        lng: null
      }
    }
  },

  mutations: {

    setGarageLocationLat(state, payload){
      state.garageData.location.lat = payload
    },

    setGarageLocationLng(state, payload){
      state.garageData.location.lng = payload
    }

  },

  getters: {

  },

  actions: {
    loadGarageLocationLat({commit}, payload){
      commit('setGarageLocationLat', payload);
    },
    loadGarageLocationLng({commit}, payload){
      commit('setGarageLocationLng', payload);
    },
  }

})

