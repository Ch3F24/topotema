<template>
    <span class="divider magnificent" @click="listShow = !listShow"></span>
    <ul class="categories h-0 lg:h-full overflow-hidden lg:overflow-visible transition-all" :class="{'h-full' : listShow}" ref="list">
        <li>
            <p class="relative select-all" @click="toggleAll()" title="Mind"></p>
        </li>
        <li>
            <label class="block">
                <input type="checkbox" name="cat-1" v-model="filters.cat1"/>
                <span>Az államvédelmi negyed</span>
            </label>
        </li>
        <li>
            <label class="block">
                <input type="checkbox" name="cat-2" v-model="filters.cat2"/>
                <span>Az államvédelmi negyed</span>
            </label>
        </li>
    </ul>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            listShow: false,
            filters: {
                cat1 : false,
                cat2 : false,
                cat3 : false
            }
        }

    },
    methods: {
        toggleAll() {
            Object.keys(this.filters).forEach((key) => {
                this.filters[key] = true

            })
        }
    }

}
</script>

<style scoped>
</style>
