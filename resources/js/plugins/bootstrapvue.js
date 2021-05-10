import {
    ButtonPlugin,
    ModalPlugin,
    TablePlugin,
    SpinnerPlugin,
    PaginationPlugin,
    TooltipPlugin,
    FormPlugin,
    CardPlugin,
    IconsPlugin
} from 'bootstrap-vue'

//https://learnvue.co/2020/01/how-to-make-your-first-vuejs-plugin/

export default {
    install(Vue,opions){
        Vue.use(ButtonPlugin)
        Vue.use(ModalPlugin)
        Vue.use(TablePlugin)
        Vue.use(SpinnerPlugin)
        Vue.use(PaginationPlugin)
        Vue.use(TooltipPlugin)
        Vue.use(FormPlugin)
        Vue.use(CardPlugin)
        // Vue.use(IconsPlugin)
    }
}