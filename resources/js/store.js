import { createStore } from "vuex";
import objects from "./objects.js";

export default new createStore({
    state() {
        return {
            objects: objects,
            checkboxStates: [],
            geoJsonLayer: [],
            map: null,
            start: 1950,
            end: 1970,
            filters: {
                category: [
                    {
                        value: "az-allamvedelmi-negyed",
                        label: "Az államvédelmi negyed",
                        checked: true,
                        clicked: false,
                        disabled: false,
                        type: "category"
                    },
                    {
                        value: "az-andrassy-uton-tul",
                        label: "Az Andrássy úton túl",
                        checked: false,
                        clicked: false,
                        disabled: true,
                        type: "category"

                    },
                    {
                        value: "orszagos-lefedettseg",
                        label: "Országos lefedettség",
                        checked: false,
                        clicked: false,
                        disabled: true,
                        type: "category"

                    },
                    {
                        value: "rejtett-helyek",
                        label: "Rejtett helyek",
                        checked: false,
                        clicked: false,
                        disabled: true,
                        type: "category"

                    },
                    {
                        value: "titkos-lakasok",
                        label: "Titkos lakások",
                        checked: false,
                        clicked: false,
                        disabled: true,
                        type: "category"

                    },
                    {
                        value: "banyaugyek",
                        label: "Bányaügyek",
                        checked: false,
                        clicked: false,
                        disabled: true,
                        type: "category"
                    },
                ],
                organizations: [
                    {
                        value: "test-szervezet",
                        label: "Test szervezet",
                        checked: false,
                        type: "organization"
                    },
                    {
                        value: "masik-szervezet",
                        label: "Masik szervezet",
                        checked: false,
                        type: "organization"
                    },
                ],
                subject_words: [
                    {
                        value: "sajt",
                        label: "sajt",
                        checked: false,
                        type: "subject_word"
                    },
                    {
                        value: "repa",
                        label: "repa",
                        checked: false,
                        type: "subject_word"
                    },
                ],
                years: [1950,1970]
            }
        }
    },
    mutations: {
        setStart(state,value) {
          state.start = value
        },
        setEnd(state,value) {
            state.end = value
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
                name: []
            }
            state.checkboxStates.year = state.filters.years;
            // state.checkboxStates.year.push(state.end);
            Object.keys(state.filters).forEach((type)=> {
                state.filters[type].forEach((filter) => {
                    if (filter.checked) {
                        switch (type) {
                            case 'category': state.checkboxStates.category.push(filter.value); break
                            // case 'year': state.checkboxStates.years.push(filter.value); break
                            case 'organizations': state.checkboxStates.organizations.push(filter.value); break
                            case 'subject_words': state.checkboxStates.subject_words.push(filter.value); break
                        }
                    }

                })
            })
        },
        async clearFilters({state}) {
            Object.keys(state.filters).forEach((type)=> {
                console.log(type)
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
        }
    },
});
