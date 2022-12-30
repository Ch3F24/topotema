<template>
    <div class="fixed top-0 left-0 w-full h-full items-center z-50 flex">

        <div class="modal w-full lg:w-[60vw] mx-auto border rounded-lg p-14 relative bg-black/80 h-[80vh] overflow-y-auto flex flex-col">

            <!-- Modal close icon -->
            <img :src="closeIcon"
                 alt="Close icon"
                 title="Close"
                 width="24"
                 class="absolute right-8 top-4 cursor-pointer"
                 @click="$emit('close')">

            <slot/>
        </div>

    </div>

</template>

<script>
import CloseIcon from "../../../public/assets/svg/close.svg"

export default {
    name: "Modal",

    data() {
        return {
            closeIcon: CloseIcon
        }
    }
}
</script>

<style>
    .modal .swiper-button-next, .swiper-rtl .swiper-button-prev {
        right: 15px;
    }
    .modal .swiper-button-prev, .swiper-rtl .swiper-button-next {
        left: 15px;
    }
</style>
