const $lang = document.documentElement.lang;

const $translations = {};

import hu from '../lang/hu.json' assert {type: 'json'};
import en from '../lang/en.json' assert {type: 'json'};

$translations.en = en;
$translations.hu = hu;

export default {
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
}
