<template>
  <q-page class="flex flex-center">
    <q-btn @click="getWeather" label="Get Users" />
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import {api} from "boot/axios";

export default defineComponent({
  name: 'UsersPage',

  setup() {

    return {
      getWeather () {
        api.get('/weather').then( response => console.log( response.data ) );
      },
    }
  }
})
</script>
