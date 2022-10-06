import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import Categories from './Components/Categories.vue';

const app = createApp({});
app.component('categories',Categories);
app.mount('#app');
