import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import store from "./store";
import LangMixin from './mixins.js';

import Slider from './Components/Slider.vue';
import Documents from './Components/Documents.vue';
import Category from './Components/Category.vue';

const app = createApp({});

app.mixin(LangMixin)

app.use(store);

app.component('slider',Slider);
app.component('documents',Documents);
app.component('category',Category);

app.mount('#app');
