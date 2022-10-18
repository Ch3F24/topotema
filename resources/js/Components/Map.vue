<template>
    <div id="mapContainer" class="h-full mb-8 md:mb-0 h-[50vh] lg:h-[60vh]"></div>
    <range_filter></range_filter>
    <input_filters></input_filters>
</template>

<script>
    import input_filters from "./Filters/InputFilter.vue"
    import range_filter from "./Filters/Range.vue"
    import "leaflet/dist/leaflet.css";
    export default {
        name: "Map",
        components: {
            input_filters,
            range_filter
        },
        date() {
            return {
                markerIcon: '/assets/images/marker-icon-2x.png'
            }
        },
        mounted() {
            //Init layer
            const layer = new L.StamenTileLayer("toner")

            //Set default map position and commit to state management
            this.$store.commit('setMap',L.map('mapContainer',{attributionControl: false}).setView([47.1556942,18.3839918], 8))

            //Set marker icon
            L.Marker.prototype.options.icon = L.icon({
                iconUrl: '/assets/images/marker-icon-2x.png',
                iconSize: [25, 41],
            });

            //Add layer to the map
            this.map.addLayer(layer);

            //Set maximum zoom
            this.map._layersMaxZoom = 17

            //pointer click function
            function whenClicked(e) {
                console.log(e.target)
                console.log(e.target.feature.properties);
            }

            function onEachFeature(feature, layer) {
                //bind click
                layer.on({
                    click: whenClicked,
                });
            }

            //Set GeoJson with filters
            let geo = L.geoJSON(null,{
                onEachFeature: onEachFeature,
                filter: (feature) => {
                    const isYearChecked = feature.properties.year >= this.checkboxStates.year[0] && feature.properties.year <= this.checkboxStates.year[1]
                    // const isYearChecked = this.checkboxStates.year.includes(feature.properties.year)
                    const isEventTypeChecked = this.checkboxStates.category.includes(feature.properties.category)
                    const isOrganizationTypeChecked = this.checkboxStates.organizations.includes(feature.properties.organizations)
                    const isSubjectWordTypeChecked = this.checkboxStates.subject_words.includes(feature.properties.subject_words)
                    const isNameChecked = this.checkboxStates.name.includes(feature.properties.Name)
                    // return isYearChecked && isEventTypeChecked //only true if both are true
                    // console.log(this.checkboxStates.year[0])
                    // console.log(this.checkboxStates.year[1])
                    // console.log(feature.properties.year)
                    // console.log(isYearChecked)
                    // return isYearChecked //only true if both are true
                    return isYearChecked && (isNameChecked || isSubjectWordTypeChecked || isOrganizationTypeChecked || isEventTypeChecked) //only true if both are true
                }
            }).addTo(this.map);

            //Set pointer popup
            geo.bindPopup((layer) => {
                // return `${layer.feature.properties.Name} <br> <a href="objects/${layer.feature.properties.Name}" target="_blank">Részletek</a>`
                return `${layer.feature.properties.Name} <br> <a href="objects" target="_blank">Részletek</a>`
            });

            //Commit geoJson to vuex
            this.$store.commit('setGeoJsonLayer',geo)

            //Update filters
            this.$store.dispatch('updateCheckboxStates');

            //Set objects
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
