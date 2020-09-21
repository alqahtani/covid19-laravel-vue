<template>
  <div class="sm:w-10/12 sm:mx-auto">
    <vue-datamaps
      :geographyConfig="geographyConfig"
      :bubblesConfig="bubblesConfig"
      :fills="fills"
      @custom:popup-bubble="popupTemplate"
      bubbles
    >
      <div slot="hoverBubbleInfo" class="hoverinfo" style="text-align:center;">
        <b>{{ popupData.country }}</b>
        <br />
        <b>Cases</b>
        : {{ popupData.cases }}
        <br />
        <b>Active</b>
        : {{ popupData.active }}
        <br />
        <b>Deaths</b>
        : {{ popupData.deaths }}
        <br />
        <b>Recovered</b>
        : {{ popupData.recovered }}
        <br />
      </div>
    </vue-datamaps>
  </div>
</template>

<script>
import { VueDatamaps } from "vue-datamaps";
export default {
  mounted() {
    axios.get("api/countries/all").then(({ data }) => {
      data.forEach((country) => {
        this.bubblesConfig.data.push({
          country: country.country,
          active: country.active,
          cases: country.cases,
          deaths: country.deaths,
          recovered: country.recovered,
          latitude: country.lat,
          longitude: country.lng,
          radius:
            country.cases / 200000 < 5 ? 5 : parseInt(country.cases / 200000),
          fillKey: "Blue",
        });
      });
    });
  },
  components: {
    VueDatamaps,
  },
  data() {
    return {
      geographyConfig: {
        popupOnHover: true,
        highlightOnHover: true,
      },
      fills: {
        defaultFill: "#35495e",
        Blue: "#3f83f8",
      },
      bubblesConfig: {
        popupTemplate: true,
        data: [],
      },
      popupData: {
        country: "",
        cases: "",
        active: "",
        deaths: "",
        recovered: "",
      },
    };
  },
  methods: {
    popupTemplate({ datum }) {
      this.popupData = {
        country: datum.country,
        cases: datum.cases,
        active: datum.active,
        deaths: datum.deaths,
        recovered: datum.recovered,
      };
    },
  },
};
</script>

<style>
</style>