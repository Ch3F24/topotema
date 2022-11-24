<template>
    <div>
        <span class="divider magnificent" @click="show = !show"></span>
        <div class="grid md:grid-cols-2 gap-4 lg:mt-12 lg:h-full overflow-hidden lg:overflow-visible transition-all px-4 lg:px-0" :class="{'h-full py-8 border-b' : show,'h-0' : !show}">
            <Select name="organizations" :select-list="filters.organizations"/>
            <AddressSearch></AddressSearch>
            <Select name="subject_words" :select-list="filters.subject_words"/>
            <ContentSearch></ContentSearch>
        </div>
    </div>
</template>

<script>
import Select from "./SelectField.vue"
import AddressSearch from "./AddressSearch.vue"
import ContentSearch from "./ContentSearch.vue"

export default {
    name: "InputFilter",
    components: {
        Select,
        AddressSearch,
        ContentSearch
    },
    data() {
        return {
            address: "",
            show: false
        }
    },
    computed: {
        filters() {
            return this.$store.state.filters
        }
    }

}
</script>

<style scoped>

</style>
