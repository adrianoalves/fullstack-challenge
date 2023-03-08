<template>
  <div class="q-pa-sm">
    <q-table
      title="Click/Tap to see User Weather Info"
      ref="tableRef"
      :loading="loading"
      :columns="columns"
      :rows="rows"
      row-key="id"
      v-model:pagination="pagination"
      @request="onRequest"
      @row-click="getWeather"
      flat
      bordered
    />

  </div>
</template>

<script>
import {defineComponent, ref, onMounted, computed, reactive} from 'vue'
import {api} from "boot/axios";
import {getWeatherData} from "src/composables/useWeatherModal.js";

export default defineComponent({
  name: 'UsersTable',
  setup () {
    const tableRef = ref()
    const columns = [
      { name: 'name', align: 'left', label: 'User', field: 'name' },
      { name: 'email',align:'left', label: 'E-mail', field: 'email' }
    ]
    const loading = ref(false)
    const rows = ref([])
    const pagination = ref({
      page: 1,
      rowsPerPage: 5,
      rowsNumber: null,
      sortBy: 'desc',
      descending: false
    })

    function getUsers (page, perPage) {
      loading.value = true
      page = page || 1
      perPage = perPage || 5
      api.get(`/users?page=${page}&per_page=${perPage}`).then( response => {
        rows.value = response.data.data
        pagination.value.rowsNumber = response.data.meta.total
        pagination.value.rowsPerPage = response.data.meta.per_page
        pagination.value.page = response.data.meta.current_page
        loading.value = false
      });
    }

    function getWeather(evt, row) {
      getWeatherData({user: row.id})
    }

    function onRequest( props ) {
      const { page, rowsPerPage } = props.pagination
      getUsers(page, rowsPerPage)
    }

    onMounted( () => getUsers() )

    return {
      tableRef,
      loading,
      columns,
      pagination,
      rows,
      getUsers,
      getWeather,
      onRequest
    }
  }
})
</script>
