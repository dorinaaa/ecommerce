import Vue from 'vue'
import Vuex from 'vuex'
// import state from './state'
// import actions from './actions'
// import mutations from './mutations'
import { cart } from './modules/cart'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {},
  mutations: {},
  getters: {},
  actions: {},
  modules: {
    cart
  },
})
