<template>
<!--    <span class="divider magnificent" @click="listShow = !listShow"></span>-->
    <ul class="categories lg:h-full overflow-hidden lg:overflow-visible transition-all mt-4 lg:mt-0" ref="list">
        <li>
            <p class="relative select-all" @click="toggleAll()" title="Mind"></p>
        </li>
        <li v-for="(filter,key) in filters.category">
            <label class="block">
                <input type="checkbox"
                       ref="category"
                       class="category"
                       :class="{'on' : filter.checked}"
                       :name="filter.value"
                       :value="filter.checked"
                       @click.prevent="!filter.disabled ? change(key) : false"
                       @checked="filter.checked"
                       :disabled="filter.disabled"/>
                <span>{{ filter.label }}</span>
            </label>
            <div v-if="filter.clicked && filter.description" class="lg:absolute left-full top-0 border-t border-b -ml-[48px] mt-6 lg:border-0 lg:bg-black/75 lg:mt-0 lg:p-8 z-[9990]">
                <p class="text-white px-4 py-8 lg:py-0 lg:w-[400px] lg:h-[300px] lg:overflow-y-scroll">
                    {{ filter.description }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            listShow: false,
            // filters: []
        }
    },
    methods: {
        change(key) {
            if (this.filters.category[key].checked) {
                this.$store.commit('setFilter', {type: 'category',key: key})
                this.$store.dispatch('updateCheckboxStates')

            } else if(this.filters.category[key].clicked) {
                this.$store.commit('setFilter', {type: 'category',key: key})
                this.$store.dispatch('updateCheckboxStates')
                this.filters.category[key].clicked = false
            } else {
                this.filters.category.forEach((filter) => {
                    filter.clicked = false
                })
                this.filters.category[key].clicked = true
            }
        },
        toggleAll() {
            this.filters.category.forEach((filter) => {
                if (!filter.disabled) {
                    filter.checked = true
                }
            })
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
