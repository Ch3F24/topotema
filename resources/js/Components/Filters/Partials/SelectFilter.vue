<template>
    <div class="input-filter" ref="dropdown" data-type="select-filter">

        <ul v-if="selectList && show" class="input-filter_dropdown">

            <li v-for="(value,key) in selectList"
                  class="cursor-pointer block hover:bg-red-500/50 hover:text-white"
                  :class="{'text-red-500' : value.checked}"
                  :title="value.label"
                  @click="select(key,value.checked)">{{ value.label }}
            </li>

        </ul>

        <button @click="show = !show">
            {{ __(this.name)}}
        </button>

    </div>
</template>

<script>
import { onClickOutside } from '@vueuse/core'

export default {
    name: "Input",

    props: {
        selectList: {
            default: null
        },
        name: {
            required: true
        }
    },

    data() {
        return {
            show: false
        }
    },

    mounted() {
      onClickOutside(this.$refs.dropdown,() => {
          if (this.show) this.show = false;
      })
    },

    methods: {
        select(key,isChecked) {
            this.$store.dispatch('clearFilter',this.name)
            if (!isChecked) this.$store.commit('setFilter', {type: this.name,key: key})
            this.$store.dispatch('updateCheckboxStates')
            this.show = false
        }
    }
}
</script>
