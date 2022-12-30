<template>

    <div class="flex space-x-4 lg:col-start-2" data-type="video-content-filter">

        <button class="bg-cinnabar rounded-full flex-1 text-white"
                @click="sort">
            {{ __('Video content') }}
        </button>

        <img :src="'assets/svg/camera.svg'" alt="Camera icon" class="w-8">

    </div>

</template>

<script>

export default {
    name: "VideoContentFilter",

    methods: {
        sort() {
            this.$store.dispatch('videoFilterToggle');
        }
    }
}
</script>
