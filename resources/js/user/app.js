import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import Element from 'element-ui'
import { store } from './store/store'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

Vue.use(Element)

require('./bootstrap')

window.Vue = Vue
window.events = new Vue()

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key =>
  Vue.component(
    key
      .split('/')
      .pop()
      .split('.')[0],
    files(key).default
  )
)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

function addElemWithDataAppToBody() {
  const app = document.createElement('div')
  app.setAttribute('data-app', true)
  document.body.append(app)
}

addElemWithDataAppToBody()
const app = new Vue({
  store,
  el: '#app',
})
