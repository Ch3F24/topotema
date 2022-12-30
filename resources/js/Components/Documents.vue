<template>
    <div class="w-1/2 lg:w-full bg-black relative overflow-hidden transition-all">

        <div class="cursor-pointer" @click="show = ! show">

            <img :src="'/assets/svg/folder.svg'" alt="Fodler icon" class="hidden lg:inline-block">

            <p class="rounded-full border border-red-500 text-white text-center p-1 lg:absolute lg:top-1/2 lg:left-0 lg:-translate-y-1/2 w-full lg:mt-2 lg:border-0 lg:rounded-none">
                {{ __('Folder') }}
            </p>

        </div>

    </div>

    <div class="w-full space-y-2 max-h-0 transition-all overflow-hidden order-last lg:order-none mt-6 ml-4 pl-6"
        :class="{'max-h-full mb-12 lg:border-l border-white border-y lg:border-y-0 space-y-4': show}">

        <!-- Listing Documents -->
        <figure v-if="documents.length">

            <figcaption class="text-cinnabar uppercase mb-3">{{ __('Documents') }}</figcaption>

            <ul title="Documents" class="space-y-2">

                <li v-for="document in documents"
                    class="text-white hover:text-cinnabar">

                    <a href=""
                       v-if="document.file"
                       :title="document.name">{{ document.name }}
                    </a>

                    <span v-else
                          @click="selectedFile = document"
                          class="cursor-pointer block"
                          :title="document.name"> {{ document.name }}
                    </span>

                </li>

            </ul>

        </figure>

        <!-- Listing memoirs -->
        <figure v-if="memoirs.length > 0">

            <figcaption class="text-cinnabar uppercase mb-3">{{ __('Memoirs') }}</figcaption>

            <ul title="Memoirs" class="space-y-2">

                <li v-for="memoir in memoirs"
                    class="text-white hover:text-cinnabar">

                    <a href=""
                       v-if="memoir.file"
                       :title="memoir.title">{{ memoir.title }}
                    </a>

                    <span v-else
                          @click="selectedFile = memoir"
                          class="cursor-pointer block"
                          :title="memoir.title">{{ memoir.title }}
                    </span>

                </li>

            </ul>

        </figure>

    </div>

    <!-- Content modal-->
    <teleport to="body">

        <Modal v-if="selectedFile"
               @close="selectedFile = null">

            <article>

                <header class="mb-6">

                    <h1 class="text-white text-[26px]">
                        <span v-if="selectedFile.name">{{ selectedFile.name }}</span>
                        <span v-if="selectedFile.title">{{ selectedFile.title }}</span>
                    </h1>

                    <ul class="flex text-white space-x-2">

                        <li v-if="selectedFile['creator'] || selectedFile['interview']">
                            <span v-if="selectedFile['creator']">{{ selectedFile['creator'] }}</span>
                            <span v-if="selectedFile['interview']">{{ selectedFile['interview'] }}</span>
                        </li>

                        <li v-if="selectedFile['date_from']">
                            {{ selectedFile['date_from']}} - {{ selectedFile['date_to']}}
                        </li>

                        <li v-if="selectedFile['storage_place']">
                            {{ selectedFile['storage_place'] }}
                        </li>

                    </ul>

                </header>

            </article>

            <div  v-if="selectedFile.content"
                  v-html="selectedFile.content"
                  class="text-white text-justify"/>

        </Modal>
    </teleport>
</template>

<script>
import Modal from "./Modal.vue"

export default {
    name: "Documents",

    props: {
        documents: {
            required: true
        },
        memoirs: {
            required: true
        }
    },

    components: { Modal },

    data() {
        return {
            show: false,
            modalOpened: false,
            selectedFile: null
        }
    }
}
</script>

<style scoped>
    article header ul li+li:before {
        content: '|';
        padding-right: .5rem;
    }
</style>
