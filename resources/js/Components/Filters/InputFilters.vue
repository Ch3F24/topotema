<template>
    <div>
        <span class="divider magnificent" @click="show = !show"></span>

        <div class="grid md:grid-cols-2 gap-4 lg:mt-12 lg:h-full overflow-hidden lg:overflow-visible transition-all px-4 lg:px-0"
             :class="{'h-full py-8 border-b' : show,'h-0' : !show}">

            <!--Organizations filter-->
            <Select name="organizations" :select-list="filters.organizations"/>

            <!--Address searcing field-->
            <AddressSearch></AddressSearch>

            <!--Subject words select filter-->
            <Select name="subject_words" :select-list="filters.subject_words"/>

            <!--Content search field-->
            <ContentSearch></ContentSearch>

            <!--Video content filter-->
            <VideoContent></VideoContent>

        </div>
    </div>
</template>

<script>
import Select from "./Partials/SelectFilter.vue"
import AddressSearch from "./Partials/AddressSearch.vue"
import ContentSearch from "./Partials/ContentSearch.vue"
import VideoContent from "./Partials/VideoContentFilter.vue";

export default {
    name: "InputFilter",

    components: {
        Select,
        AddressSearch,
        ContentSearch,
        VideoContent
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
