<template>
    <div v-if="photos.length">

        <!-- Large slider -->
        <swiper
            :style="config.style"
            :navigation="config.navigation"
            @click="modalOpened = true"
            @init="sliderInit"
            @slideChange="slideChange"
            :spaceBetween="10"
            :thumbs="{ swiper: thumbsSwiper }"
            :modules="modules"
            class="images"
        >
            <swiper-slide v-for="photo in photos">
                <img :src="photo.src" />
            </swiper-slide>

        </swiper>

        <!-- Thumbnail slider -->
        <div class="relative mt-6"
             :style="{ '--swiper-theme-color': '#fff'}">
            <swiper
                @swiper="setThumbsSwiper"
                :spaceBetween="10"
                :slidesPerView="4"
                :freeMode="true"
                :watchSlidesProgress="true"
                :modules="modules"
                class="thumbs mx-8"
            >
                <swiper-slide v-for="photo in photos">
                    <img :src="photo.thumbnail" class="w-28" />
                </swiper-slide>
            </swiper>

            <!-- Prev/Next Buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>

        <!-- Photo modal -->
        <teleport to="body">

            <Modal v-show="modalOpened" @close="modalOpened = false" v-if="activeSlideImg">
                <!-- Prev/Next Buttons-->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- Photo infos -->
                <div class="mb-4">
                    <p class="text-white"
                       v-if="activeSlideImg.title">{{ activeSlideImg.title }}
                    </p>

                    <p class="text-white"
                       v-if="activeSlideImg.storage_place">{{ activeSlideImg.storage_place }}
                    </p>

                    <p class="text-white"
                       v-if="activeSlideImg.creator">{{ activeSlideImg.creator }}
                    </p>

                </div>

                <div class="relative w-full flex-1">

                    <div class="relative inset-0 h-full w-full">

                        <picture class="absolute inset-0 h-full">

                            <div class="inset-0 absolute h-full">

                                <img :src="activeSlideImg.src"
                                     class="mx-auto object-contain max-h-full relative w-auto h-auto">
                            </div>

                        </picture>

                    </div>

                </div>

                <!-- Photo description -->
                <div class="mt-4" v-if="activeSlideImg.description">

                    <p class="text-white">{{ activeSlideImg.description }}</p>

                </div>
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
            modules: [
                FreeMode,
                Navigation,
                Thumbs
            ],
            thumbsSwiper: null,
            modalOpened: false,
            activeSlideImg: null,
            config: {
                navigation: {
                    enabled: true,
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                style: {
                    '--swiper-navigation-color': '#fff',
                    '--swiper-pagination-color': '#fff',
                    '--swiper-navigation-size': '1.5rem',
                }
            }
        }
    },

    methods: {
        setThumbsSwiper(swiper) {
            this.thumbsSwiper = swiper;
        },
        slideChange(swiper) {
            this.activeSlideImg = this.photos[swiper.activeIndex]
        },
        sliderInit(swiper) {
            this.activeSlideImg = this.photos[swiper.activeIndex]
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
