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
Vue.component('addresses-autocomplete', require('./components/auth/AddressesAutocomlete').default);
Vue.component('your-address', require('./components/auth/YourAddress').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.config.errorHandler = function (err, vm, info) {
//     alert(`Error: ${err.toString()}\nInfo: ${info}`);
// }
// Vue.config.warnHandler = function (msg, vm, trace) {
//     alert(`Warn: ${msg}\nTrace: ${trace}`);
// }
const app = new Vue({
    el: '#app',
    data: {
        'addressSelectedListChange': '',
        'yourAddress': '',
        'yourAddressChange': '',
    },
    watch: {
        yourAddress: function (newVal, oldVal) {
            // Введенный вручную
            if (newVal !== '') {
                this.yourAddressChange = Math.random().toString(36).substring(7);
            }
        },
    },
    methods: {
        setAddressSelectedYour: function (address) {
            this.yourAddress = address;
        },
        setAddressListChange: function (change) {
            // alert(change)
            this.addressSelectedListChange = change;
        },
    },
});
