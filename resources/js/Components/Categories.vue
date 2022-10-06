<template>
    <span class="divider magnificent" @click="listShow = !listShow"></span>
    <ul class="categories h-0 lg:h-full overflow-hidden transition-all" :class="{'h-full' : listShow}" ref="list">
        <li>
            <label class="block">
                <input type="checkbox" name="cat-1" value="cat-1"/>
                <span>Az államvédelmi negyed</span>
            </label>
        </li>
        <li>
            <label class="block">
                <input type="checkbox" name="cat-2" value="cat-2"/>
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
            listShow: false
        }

    },
    methods: {
    }

}
</script>

<style scoped>
</style>
