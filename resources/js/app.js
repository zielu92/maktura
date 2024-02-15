import './bootstrap';

import Alpine from 'alpinejs';


import { createApp } from 'vue';
import IncrementCounter from './components/test.vue';

createApp({})
  .component('IncrementCounter', IncrementCounter)
  .mount('#app')


window.Alpine = Alpine;

Alpine.start();
