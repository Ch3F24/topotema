<template>

    <div class="input-filter" ref="dropdown">

        <div v-if="this.results.length"
             class="input-filter_dropdown">

            <span v-for="result in results"
                  class="cursor-pointer block hover:bg-red-500/50 hover:text-white"
                  @click="select(result)">
                {{ result.properties.full_address }}
            </span>

        </div>

        <div class="search-input">

            <input type="text"
                   :placeholder="__('Address')"
                   v-model="query"
                   @input="search"
                   @keyup.enter="select()"
                   class="focus:outline-0">
        </div>

    </div>

</template>

<script>
export default {
    name: "Search",

    data() {
        return {
            query: "",
            results: []
        }
    },

    methods: {
        search() {
            if (this.query) {
                this.results = []
                let q = this.query.toLowerCase();
                this.objects.forEach(x => {
                    if (x.properties["full_address"].toLowerCase().includes(q) || x.properties["organizations"].toLowerCase().includes(q)) this.results.push(x)
                });
            }
        },
        select(object) {
            if (this.query === "") {
                this.$store.dispatch('clearFilters');
                this.$store.dispatch('filtering');
            } else {
                this.$store.dispatch('filtering',object.properties.full_address);
                this.results = [];
            }
        }
    },

    watch: {
      query() {
          if (this.query === "") {
              this.results = []
          }
      }
    },

    computed: {
        objects() {
            return this.$store.state.objects.features
        },
        geoJsonLayer() {
            return this.$store.state.geoJsonLayer
        }
    }
}
</script>
