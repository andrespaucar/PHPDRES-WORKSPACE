import Saludo from './Hello.vue'

export default {
    install(Vue,options){
        Vue.component('saludo',Saludo)
    }
}
