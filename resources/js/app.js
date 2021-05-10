import Vue from "vue";

 
import BootstrapVueCustomComponets from "./plugins/bootstrapvue";
import CustomComponents from './components/index'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVueCustomComponets)
Vue.use(CustomComponents)


// PAGES
Vue.component('page-users-component',require('./views/users/index.vue').default)

const app = new Vue({
    el:"#app",
})