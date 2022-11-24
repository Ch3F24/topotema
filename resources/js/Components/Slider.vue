<template>
    <div v-if="photos.length">
        <swiper
            :style="{
      '--swiper-navigation-color': '#fff',
      '--swiper-pagination-color': '#fff',
      '--swiper-navigation-size': '1.5rem',
    }"
            :navigation="{
            enabled: true,
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }"
            @click="modalOpened = true"
            @init="sliderInit"
            @slideChange="slideChange"
            :spaceBetween="10"
            :thumbs="{ swiper: thumbsSwiper }"
            :modules="modules"
            class="images"
        >
            <swiper-slide v-for="photo in photos"><img :src="photo.src" /></swiper-slide>

        </swiper>

        <div class="relative mt-6" :style="{ '--swiper-theme-color': '#fff'}">
            <swiper
                @swiper="setThumbsSwiper"
                :spaceBetween="10"
                :slidesPerView="4"
                :freeMode="true"
                :watchSlidesProgress="true"
                :modules="modules"
                class="thumbs mx-8"
            >
                <swiper-slide v-for="photo in photos"><img :src="photo.thumbnail" class="w-28" /></swiper-slide>
            </swiper>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <teleport to="body">
            <Modal v-show="modalOpened" @close="modalOpened = false">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <img :src="activeSlideImg" alt="" class="mx-auto h-[70vh] object-contain ">
            </Modal>
        </teleport>
    </div>

</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import Modal from "./Modal.vue"
import 'swiper/css';
import "swiper/css/free-mode"
import "swiper/css/navigation"
import "swiper/css/thumbs"

import {FreeMode,Navigation,Thumbs} from 'swiper';

export default {
    components: {
        Swiper,
        SwiperSlide,
        Modal
    },
    props: {
      photos: {
          default: []
      }
    },
    data() {
        return {
            modules: [FreeMode,Navigation,Thumbs],
            thumbsSwiper: null,
            modalOpened: false,
            activeSlideImg: null
        }
    },

    methods: {
        setThumbsSwiper(swiper) {
            this.thumbsSwiper = swiper;
        },
        slideChange(swiper) {
            this.activeSlideImg = swiper.slides[swiper.activeIndex].querySelector('img').src
        },
        sliderInit(swiper) {
            this.activeSlideImg = swiper.slides[swiper.activeIndex].querySelector('img').src
        }

    }
}
</script>
<style>
.thumbs.swiper {
    margin: 0 2rem;
}
.images img {
    height: 300px;
    object-fit: cover;
    width: 100%;
}
.swiper-button-next:after, .swiper-button-prev:after {
    font-size: 1.5rem;
}
.swiper-button-next, .swiper-rtl .swiper-button-prev {
    right: 0;
}
.swiper-button-prev, .swiper-rtl .swiper-button-next {
    left: 0;
}
.swiper-button-next,
.swiper-button-prev {
    color: #ffffff;
}
</style>
