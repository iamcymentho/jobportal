// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */

// import './bootstrap';
// import { createApp } from 'vue';
// import * as VueRouter from 'vue.router'

// /**
//  * Next, we will create a fresh Vue application instance. You may then begin
//  * registering components with the application instance so they are ready
//  * to use in your application's views. An example is included for you.
//  */

// const app = createApp({});

// // import ExampleComponent from './components/ExampleComponent.vue';
// // app.component('example-component', ExampleComponent);

// import ApplyComponent from './components/ApplyComponent.vue';
// app.component('apply-component', ApplyComponent);

// createApp(ApplyComponent).mount("#applycomponent")



// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */


// // Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
// //     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// // });

// /**
//  * Finally, we will attach the application instance to a HTML element with
//  * an "id" attribute of "app". This element is included with the "auth"
//  * scaffolding. Otherwise, you will need to add an element yourself.
//  */

// app.mount('#app');

// require('./bootstrap');

// window.Vue = require('vue');

// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// import VueAxios from 'vue-axios';
// import axios from 'axios';
// Vue.use(VueAxios, axios);

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const router = new VueRouter ({ mode: 'history'});
// const app = new Vue(Vue.util.extend({ router })).$mount('#app');


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import ApplyComponent from './components/ApplyComponent.vue';
// import CreateComponent from './components/CreateComponent.vue';
// import IndexComponent from './components/IndexComponent.vue';
// import EditComponent from './components/EditComponent.vue';

const routes = [
  {
      name: 'apply',
      path: '/applications/{id}',
      component: ApplyComponent
  },
//   {
//       name: 'create',
//       path: '/create',
//       component: CreateComponent
//   },
//   {
//       name: 'posts',
//       path: '/posts',
//       component: IndexComponent
//   },
//   {
//       name: 'edit',
//       path: '/edit/:id',
//       component: EditComponent
//   }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');