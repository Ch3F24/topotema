import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import store from "./store";
import Categories from './Components/Filters/Categories.vue';
import Map from './Components/Map.vue';
import LangMixin from './mixins.js';


const app = createApp({});

app.mixin(LangMixin)

app.use(store);

app.component('categories',Categories);
app.component('maps',Map);

app.mount('#app');

// Home page background image shift
let body = document.body;

function shiftBg() {
    let currentIndex = parseInt(body.dataset.bg);
    if (currentIndex === 3) {
        body.dataset.bg = 1;
    } else {
        body.dataset.bg = currentIndex + 1;
    }
    setTimeout(shiftBg,5000);
}
setTimeout(shiftBg,5000);
