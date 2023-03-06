<template>
  <q-page class="flex flex-center">
    <UsersTable />
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import UsersTable from "components/UsersTable.vue"

export default defineComponent({
  name: 'IndexPage',
  components: {
    UsersTable
  }
})
</script>
