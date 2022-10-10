<template>
    <div class="input-filter" ref="dropdown">
        <div v-if="this.results.length" class="input-filter_dropdown">
            <span v-for="result in results"
                  class="cursor-pointer block hover:bg-red-500/50 hover:text-white" @click="select(result)">{{ result.properties.Name }}</span>
        </div>
        <input type="text" placeholder="Cím" v-model="query" @input="search">
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
                this.objects.forEach(x => {
                    if (x.properties["Name"].toLowerCase().includes(this.query.toLowerCase()) || x.properties["organiser"].toLowerCase().includes(this.query.toLowerCase())) this.results.push(x)
                });
            }
            // const res = this.objects.filter(obj => Object.values(obj).some(val => val.includes(this.query)));
            // console.log(res)
        },
        select(object) {
            // this.$store.dispatch('clearFilters');
            this.$store.dispatch('filtering',object.properties.Name);
            this.results = [];

            // this.geoJsonLayer.clearLayers()
            // // this.$store.dispatch('updateCheckboxStates');
            // this.$store.commit('addressSearch',object.properties.Name)
            // this.geoJsonLayer.addData(this.objects)
            // //
            // // this.markers = this.geoJsonLayer._layers;
            // //
            // let m = [];
            // //
            // for (const marker of Object.entries(this.geoJsonLayer._layers)) {
            //     m.push(marker[1]._latlng)
            // }
            // //
            // if (m.length) {
            //     this.map.fitBounds([
            //         m
            //     ])
            // }
            // console.log(this.geoJsonLayer)
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

<style scoped>

</style>
