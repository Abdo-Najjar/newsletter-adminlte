/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');



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

Vue.component('type-button' , require('./components/TypeButton.vue').default);
// import TypeButton from './components/TypeButton.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {

        buttons: []

    }
    ,
    mounted()
    {
        
        axios.get('/types/json')

              .then( function(response){
                
                this.buttons = response.data;
              })
              .catch(function(error){


              });


        this.buttons =[
            { id: 1, type: "image" },
            { id: 2, type: "image1" },
            { id: 3, type: "image2" },
            { id: 4, type: "image3" },
        ];

    }

});
