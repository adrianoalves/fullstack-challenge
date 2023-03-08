import {ref} from 'vue'
import {api} from "boot/axios"

const iconMap = {
  'cloudy_snowing': [300, 499],
  'water_drop': [500, 501,502,503,504, 520,521, 522, 531],
  'severe_cold': [511],
  'ac_unit': [600, 601, 602, 611, 612, 613, 615, 616, 620, 621, 622],
  'air': [701, 711, 721, 731, 741, 751, 761, 762, 771, 781],
  'sunny': [800],
  'party_cloud_day': [801],
  'cloudy': [802, 803, 804]
}
const unitMap = {
  'kelvin': 'K°',
  'metric': 'C°',
  'imperial': 'F°'
}
const show = ref(false)
const loading = ref(false)
const weatherData = ref({})

function getWeatherData(props) {
  loading.value = true
  api.get(`/weather/${props.user}`)
  .then( response => {
    console.log( response.data );
    weatherData.value = response.data
    loading.value = false
    show.value = true
  })
  .catch( e => {
    console.log(e)
  })
}

function getWeatherIcon(id){
  let icon = Object.keys(iconMap).filter( key => iconMap[key].includes(id) )

  if(icon.length)
    return icon[0];
  else
    return 'sunny';
}
export {
  show, loading, weatherData, iconMap, unitMap, getWeatherData, getWeatherIcon
}
