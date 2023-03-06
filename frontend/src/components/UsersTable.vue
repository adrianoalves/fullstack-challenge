<template>
  <div class="q-pa-sm">
    <q-table
      title="Users"
      :columns="columns"
      :rows="rows"
    />
    <div class="row justify-center q-mt-md">
      <q-pagination
        v-model="pagination.page"
        color="grey-8"
        :max="pagination.per_page"
        size="sm"
      />
    </div>
  </div>
</template>

<script>
import {defineComponent, ref, onMounted, reactive} from 'vue'
import {api} from "boot/axios";

export default defineComponent({
  name: 'UsersTable',
  setup () {
    const columns = [
      { name: 'name', align: 'center', label: 'User', field: 'name' },
      { name: 'email', label: 'E-mail', field: 'email' }
    ]
    let rows = reactive([])
    let pagination = ref({
      page: 1,
      per_page: 5
    })

    function getUsers (page, perPage) {
      page = page || 1
      perPage = perPage || 5
      api.get(`/users?page=${page}&per_page=${perPage}`).then( response => {
        console.log( response.data );
        rows = response.data.data
        pagination.value.per_page = response.data.meta.per_page
        pagination.value.page = response.data.meta.current_page
      });
    }

    onMounted( () => getUsers() )

    return {
      columns,
      pagination,
      rows,
      getUsers
    }
  }
})
</script>
