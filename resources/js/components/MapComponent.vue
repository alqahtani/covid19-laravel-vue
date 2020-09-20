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
  components: {
    VueDatamaps,
  },
  props: ["allCountries"],
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
        data: [
          {
            radius: 25,
            cases: 15000,
            fillKey: "Blue",
            latitude: 20,
            longitude: 77,
          },
        ],
      },
      popupData: {
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