<template>
    <div id="mapContainer" class="h-full mb-8 md:mb-0 h-[50vh] lg:h-[60vh]"></div>
    <input_filters></input_filters>
</template>

<script>
    import input_filters from "./Filters/InputFilter.vue"
    import "leaflet/dist/leaflet.css";
    // import objects from "../objects.js";
    export default {
        name: "Map",
        components: {input_filters},
        date() {
            return {

            }
        },
        mounted() {
            const layer = new L.StamenTileLayer("toner")
            this.$store.commit('setMap',L.map('mapContainer',{attributionControl: false}).setView([47.1556942,18.3839918], 8))

            this.map.addLayer(layer);
            this.map._layersMaxZoom = 17

            function whenClicked(e) {
                console.log(e.target.feature.properties);
            }
            function onEachFeature(feature, layer) {
                //bind click
                layer.on({
                    click: whenClicked
                });
            }
            let geo = L.geoJSON(null,{
                onEachFeature: onEachFeature,
                filter: (feature) => {
                    // const isYearChecked = this.checkboxStates.years.includes(feature.properties.year)
                    const isEventTypeChecked = this.checkboxStates.category.includes(feature.properties.category)
                    const isOrganizationTypeChecked = this.checkboxStates.organizations.includes(feature.properties.organizations)
                    const isSubjectWordTypeChecked = this.checkboxStates.subject_words.includes(feature.properties.subject_words)
                    const isNameChecked = this.checkboxStates.name.includes(feature.properties.Name)
                    // return isYearChecked && isEventTypeChecked //only true if both are true
                    return isNameChecked || isSubjectWordTypeChecked || isOrganizationTypeChecked || isEventTypeChecked //only true if both are true
                }
            }).addTo(this.map)

            this.$store.commit('setGeoJsonLayer',geo)

            this.$store.dispatch('updateCheckboxStates');

            this.geoJsonLayer.addData(this.objects)
        },
        watch: {
            filters: {
                handler() {
                    this.$store.dispatch('filtering')
                },
                deep:true
            }
        },
        computed: {
            checkboxStates() {
              return this.$store.state.checkboxStates;
            },
            filters() {
                return this.$store.state.filters;
            },
            objects() {
                return this.$store.state.objects
            },
            geoJsonLayer() {
                return this.$store.state.geoJsonLayer
            },
            map() {
                return this.$store.state.map
            }
        }

    }
</script>

<style scoped>

</style>
