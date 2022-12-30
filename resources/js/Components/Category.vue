<template>

    <p class="uppercase">{{ category.title }}</p>

    <p>
        <span v-if="category.description">{{ category.description }}</span>

        <span class="text-cinnabar hover:text-white"
              @click="open = true"
              v-if="category.content">
            {{ __('(Details)') }}
        </span>

    </p>

    <teleport to="body">

        <Modal @close="open = false" v-if="open">

            <div v-html="category.content" class="text-white"></div>

        </Modal>

    </teleport>

</template>

<script>
import Modal from "./Modal.vue"


export default {
    name: "Category",

    components: {
        Modal
    },

    props: {
        category: {
            required: true
        }
    },

    data() {
        return {
            open: false
        }
    }
}
</script>

<style scoped>

</style>
