<template>

    <div class="input-filter search-input">

        <input type="text"
               :placeholder="__('Content search')"
               v-model="query"
               @keydown.enter="search"
               class="focus:outline-0">

    </div>

</template>

<script>
export default {
    name: "Search",

    data() {
        return {
            query: "",
        }
    },

    methods: {
        search() {
            if (this.query) {
                window.location.href = '/search?query=' + this.query;
            }
        },
    },
}
</script>
