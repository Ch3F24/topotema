import { createStore } from "vuex";

export default new createStore({
    state() {
        return {
            objects: [],
            addresses: [],
            checkboxStates: [],
            geoJsonLayer: [],
            map: null,
            start: 1944,
            end: 1990,
            filters: {
                category: [],
                organizations: [],
                subject_words: [],
                years: [1944,1990],
                // video: false
            }
        }
    },
    mutations: {
        setFilters(state,filter) {
            state.filters[filter.type] = filter.value;
        },
        setObjects(state,value) {
          state.objects = value
        },
        setYear(state,value) {
            state.filters.years = [];
            value.forEach((year) => {
                state.filters.years.push(parseInt(year));
            })
        },
        setFilter(state,filter) {
            state.filters[filter.type][filter.key].checked = !state.filters[filter.type][filter.key].checked;
        },
        setGeoJsonLayer(state,value) {
            state.geoJsonLayer = value;
        },
        setMap(state,value) {
          state.map = value;
        },
        addressSearch(state,value) {
            state.checkboxStates = {
                category: [],
                year: [],
                organizations: [],
                subject_words: [],
                name: [value]
            }
        }
    },
    actions: {
        updateCheckboxStates({state}) {
            state.checkboxStates = {
                category: [],
                year: [],
                organizations: [],
                subject_words: [],
                name: [],
                video: false
            }
            state.checkboxStates.year = state.filters.years;
            // state.checkboxStates.year.push(state.end);
            Object.keys(state.filters).forEach((type)=> {

                // Check filter is array
                if ((Array.isArray(state.filters[type]))) {
                    state.filters[type].forEach((filter) => {
                        if (filter.checked) {
                            switch (type) {
                                case 'category': state.checkboxStates.category.push(filter.value); break
                                case 'organizations': state.checkboxStates.organizations.push(filter.value); break
                                case 'subject_words': state.checkboxStates.subject_words.push(filter.value); break
                            }
                        }

                    })
                } else {
                    state.checkboxStates[type] = state.filters[type]
                }
            })
        },
        async clearFilters({state}) {
            Object.keys(state.filters).forEach((type)=> {
                if (type !== 'years') {
                    state.filters[type].forEach((filter) => {
                        filter.checked = false
                    })
                }
            })
        },
        async clearFilter({state},filter) {
            state.filters[filter].forEach((filter) => {
                filter.checked = false
            })
        },
        async filtering({state,dispatch,commit},search = null) {

            state.geoJsonLayer.clearLayers()

            if (search) {
                await dispatch("clearFilters");
                commit('addressSearch',search)
            } else {
                dispatch('updateCheckboxStates');
            }

            state.geoJsonLayer.addData(state.objects)

            let markers = state.geoJsonLayer._layers;

            let m = [];

            for (const marker of Object.entries(markers)) {
                m.push(marker[1]._latlng)
            }

            if (m.length) {
                state.map.fitBounds([
                    m
                ])
            }
        },
        videoFilterToggle({state}) {
            state.filters.video = ! state.filters.video;
        }
    },
});
