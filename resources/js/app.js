import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import store from "./store"
import Categories from './Components/Filters/Categories.vue';
import Map from './Components/Map.vue';

const app = createApp({});
app.use(store);

const $lang = document.documentElement.lang;

const $translations = {};

import hu from '../lang/hu.json' assert {type: 'json'};
import en from '../lang/en.json' assert {type: 'json'};

$translations.en = en;
$translations.hu = hu;

app.mixin({
    data() {
        return {
            loc: $lang,
        }
    },
    methods: {
        __: function __(key) {
            return $translations[$lang][key] || key;
        },
    }
})

app.component('categories',Categories);
app.component('maps',Map);
app.mount('#app');

let body = document.body;
function changeBg() {
    let currentIndex = parseInt(body.dataset.bg);
    if (currentIndex === 3) {
        body.dataset.bg = 1;
    } else {
        body.dataset.bg = currentIndex + 1;
    }
    setTimeout(changeBg,5000);
}
setTimeout(changeBg,5000);
// changeBg();
// while (true) {

// }
