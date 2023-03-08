<template>
  <q-page class="flex flex-center">
    <UsersTable />
    <WeatherModal />
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import UsersTable from "components/UsersTable.vue"
import WeatherModal from "components/WeatherModal.vue"

export default defineComponent({
  name: 'IndexPage',
  components: {
    UsersTable, WeatherModal
  }
})
</script>
