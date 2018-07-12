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
      },
      address: null,
      city: null,
      state: null,
      postal: null,
      title: null,
      description: null,
      tags: [],
      type: null,
      startDate: null,
      endDate: null,
      startHour: null,
      endHour: null,
      photos:[],
    },
    typeGarages:[],
    garageByUser: [],
    alertMessage: {
      title: null,
      type: null,
      show: false,
    },
    listState: [],
    searchGarages: [],
    newUser: {
      name: '',
      email: '',
      type: 'client',
      password: ''
    },
    userActive: false,
    mapCenter: [36.116203, -119.681564],
    mapZoom: 6
  },

  mutations: {

    setMapCenter(state, payload) {
      state.mapCenter = payload;
    },

    setMapZoom(state, payload) {
      state.mapZoom = payload;
    },

    setUserActive(state, payload){
      state.userActive = payload;
    },

    setNewUser(state, payload) {
      state.newUser.name = payload.name;
      state.newUser.email = payload.email;
      state.newUser.password = payload.password;
    },

    setSearchGarages(state, payload) {
      state.searchGarages = payload;
    },

    setListState(state, payload) {
      state.listState = payload;
    },

    setAlerMessageTitle(state, payload) {
      state.alertMessage.title = payload;
    },

    setAlerMessageType(state, payload) {
      state.alertMessage.type = payload;
    },

    setAlerMessageShow(state, payload) {
      state.alertMessage.show = payload;
    },

    setGarageByUser(state, payload) {
      state.garageByUser = payload;
    },

    setGarageAddress(state, payload) {
      state.garageData.address = payload;
    },

    setGarageCity(state, payload) {
      state.garageData.city = payload;
    },

    setGarageState(state, payload) {
      state.garageData.state = payload;
    },

    setGaragePostal(state, payload) {
      state.garageData.postal = payload;
    },

    setGarageLocationLat(state, payload){
      state.garageData.location.lat = payload
    },

    setGarageLocationLng(state, payload){
      state.garageData.location.lng = payload
    },

    setGarageTitle(state, payload){
      state.garageData.title = payload
    },

    setGarageDescription(state, payload){
      state.garageData.description = payload
    },

    setGarageTags(state, payload){
      state.garageData.tags = payload
    },

    setGarageType(state, payload){
      state.garageData.type = payload
    },

    setGarageStartDate(state, payload){
      state.garageData.startDate = payload
    },

    setGarageEndDate(state, payload){
      state.garageData.endDate = payload
    },

    setGarageStartHour(state, payload){
      state.garageData.startHour = payload
    },

    setGarageEndHour(state, payload){
      state.garageData.endHour = payload
    },

    setGaragePhotos(state, payload){
      state.garageData.photos = payload
    },

    setTypeGarages(state, payload){
      state.typeGarages = payload;
    }

  },

  getters: {

    getMapCenter(state) {
      return state.mapCenter;
    },

    getMapZoom(state) {
      return state.mapZoom;
    },

    getUserActive(state) {
      return state.userActive;
    },

    getNewUser(state) {
      return state.newUser;
    },

    getSearchGarages(state){
      return state.searchGarages;
    },

    getlistState(state){
      return state.listState;
    },

    getTypeGarages(state){
      return state.typeGarages;
    },

    getGarageData(state){
      return state.garageData;
    },

    getGarageByUser(state){
      return state.garageByUser;
    },

    getAlertMessageTitle(state){
      return state.alertMessage.title;
    },

    getAlertMessageType(state){
      return state.alertMessage.type;
    },

    getAlertMessageShows(state){
      return state.alertMessage.show;
    },

  },

  actions: {

    loadMapCenter({commit}, payload) {
      commit('setMapCenter', payload);
    },

    loadMapZoom({commit}, payload) {
      commit('setMapZoom', payload);
    },

    loadUserActive({commit}, payload) {
      commit('setUserActive', payload);
    },

    loadNewUser({commit}, payload) {
      commit('setNewUser', payload);
    },

    loadSearchPostal({commit}, payload) {
      return new Promise((resolve, reject) => {
        axios.get('/api/search/code/'.concat(payload)).then( res => {

          if (res.data === false) {
            reject();
          } else {
            commit('setSearchGarages', res.data);
            resolve()
          }
        }).catch( () => {
          reject();
        })
      });
    },

    loadSearchAddress({commit}, payload) {
      return new Promise((resolve, reject) => {
        axios.get(`/api/search/address/${payload}`).then( res => {
          if (res.data === false) {
            reject();
          }else {
            commit('setSearchGarages', res.data);
            resolve()
          }
        }).catch( () => {
          reject();
        })
      });
    },

    loadListState({commit}, payload) {
      return new Promise((resolve, reject) => {
        axios.get('/api/state').then( res =>{
          commit('setListState', res.data.data);
          resolve();
        }).catch( () => {
          reject();
        });
      });
    },

    loadAlertMessageTitle({commit}, payload){
      commit('setAlerMessageTitle', payload);
    },

    loadAlertMessageType({commit}, payload){
      commit('setAlerMessageType', payload);
    },

    loadAlertMessageShow({commit}, payload) {
      commit('setAlerMessageShow', payload);
    },

    loadGarageByUser({commit}){
      return new Promise((resolve, reject) => {
        axios.get('/admin/api/garage/by-user').then( res => {
          commit('setGarageByUser', res.data);
          resolve();
        }).catch( () => {
          reject();
        })
      });
    },

    loadGarageLocationLat({commit}, payload){
      commit('setGarageLocationLat', payload);
    },

    loadGarageLocationLng({commit}, payload){
      commit('setGarageLocationLng', payload);
    },

    loadGarageLocationBasic({commit}, payload){
      commit('setGarageAddress', payload.address);
      commit('setGarageCity', payload.city);
      commit('setGarageState', payload.state);
      commit('setGaragePostal', payload.postalCode);
    },

    loadGarageDataBasic({commit}, payload){
      commit('setGarageTitle', payload.title);
      commit('setGarageDescription', payload.description);
      commit('setGarageTags', payload.tags);
      commit('setGaragePhotos', payload.photos);
      commit('setGarageTags', payload.tags);
      commit('setGarageType', payload.type);
      commit('setGarageStartDate', payload.startDate);
      commit('setGarageEndDate', payload.endDate);
      commit('setGarageStartHour', payload.startHour);
      commit('setGarageEndHour', payload.endHour);
    },

    loadGaragePhotos({commit}, payload){
      commit('setGaragePhotos', payload);
    },

    loadTypeGarages({commit}){
      return new Promise((resolve, reject) => {

        axios.get('/api/type-garage')
          .then( res => {
            commit('setTypeGarages', res.data.data);
            resolve();
          }).catch(() => {
            reject();
          })
      });
    }

  }

})

