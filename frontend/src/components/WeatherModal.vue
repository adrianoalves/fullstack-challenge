<template>
  <div class="">
    <q-dialog v-model="show">
      <q-card class="my-card">
        <q-card-section class="row q-pb-none">
          <q-btn icon="close" flat dense v-close-popup />
        </q-card-section>

        <q-card-section class="q-pa-lg">

          <div class="row no-wrap items-center">
            <div class="col text-h4 ellipsis text-purple-14 text-center">
             {{ weatherData.temp }} {{ unitMap[weatherData.unit] }}
            </div>
          </div>

        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="text-subtitle1 row text-grey-14">
            <div class="col-auto q-pa-sm">
              <q-icon size="sm" :name="getWeatherIcon(weatherData.weather_condition_code)" color="blue-14" /> {{ weatherData.description }}
            </div>
            <div class="col-auto q-pa-sm">
               <q-icon size="sm" name="water" color="blue-14" /> {{ weatherData.humidity }}%
            </div>
            <div class="col-auto q-pa-sm">
               <q-icon size="sm" name="compress" color="blue-14" /> {{ weatherData.pressure }}
            </div>

          </div>
        </q-card-section>


      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import {defineComponent, ref} from 'vue'
import {show, loading, weatherData, getWeatherIcon, unitMap} from "src/composables/useWeatherModal";

export default defineComponent({
  name: 'WeatherModal',

  setup () {
    const modalRef = ref()

    return {
      modalRef: modalRef,
      loading,
      show,
      unitMap,
      weatherData,
      getWeatherIcon,
    }
  }
})
</script>
