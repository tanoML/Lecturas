/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('emptydata-component', require('./components/adviceToEmptyData.vue').default);
Vue.component('emptycarrer-component',require('./components/adviceToDontHaveCarrers.vue').default);
Vue.component('addcampus-component', require('./components/addCampus.vue').default);
Vue.component('addcarrera-component', require('./components/addCarrera.vue').default);
Vue.component('emptytabledate-component', require('./components/emptyTableOfDate.vue').default);
Vue.component('emptytabledatereport-component', require('./components/emptyTableOfDateReport.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        selected: '',
        carrers: [],
        flagCarrer: 0,
        flagUpdateStudent: false,
        selectedUpdate: '',
        flagUpdateDocente: false,
        selectedUpdateDoc: '',
        flagUpdateResponsable: false,
        selectedUpdateRes: '',
        flagChangeResponsable: true,
        flagToQuitResponsable:true,
        flagToaddCampus: false,
        flagToaddCarrera: false,
        flagToEditCarrera: false,


    },
    methods:{
        onGetCarrers(){
            axios.get('../../carrers/' + this.selected).then((response) => {
                this.carrers = response.data;
            });
        },
        getCarrersUpdate(){
            this.flagCarrer = 1;
            axios.get('../../carrers/' + this.selectedUpdate).then((response) => {
                this.carrers = response.data;
            });
        },
        getCarrersDocenteUpdate(){
            axios.get('../../carrers/' + this.selectedUpdateDoc).then((response) => {
                this.carrers = response.data;
            });
        },
        getCarrersResponsableUpdate(){
            axios.get('../../carrers/' + this.selectedUpdateRes).then((response) => {
                this.carrers = response.data;
            });
        },

    },

});


setTimeout(function(){$('.alert').alert('close')},7000);