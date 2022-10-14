import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import store from "./store"
import Slider from './Components/Slider.vue';

const app = createApp({});
app.use(store);

// const $lang = document.documentElement.lang;
//
// const $translations = {};
//
// import hu from '../lang/hu.json' assert {type: 'json'};
// import en from '../lang/en.json' assert {type: 'json'};
//
// $translations.en = en;
// $translations.hu = hu;

// app.mixin({
//     data() {
//         return {
//             loc: $lang,
//         }
//     },
//     methods: {
//         __: function __(key) {
//             return $translations[$lang][key] || key;
//         },
//     }
// })

// app.component('categories',Categories);
app.component('slider',Slider);
app.mount('#app');


//PDf folder
let folder = document.getElementById('pdf-folder');
let files = document.getElementById('folder-files')

folder.addEventListener('click',function () {
    if (files.classList.contains('show')) {
        files.classList.remove('show');
    } else {
        files.classList.add('show');
    }
})
