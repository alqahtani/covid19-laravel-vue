<template>
  <span
    @click="upDB"
    href="#"
    class="text-blue-500 mb-2 mr-4 inline-block hover:text-blue-700 flex items-center cursor-pointer"
  >
    <svg
      v-if="!loading"
      class="w-6 h-6 mr-1"
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path
        fill-rule="evenodd"
        d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
        clip-rule="evenodd"
      />
    </svg>
    <clip-loader v-if="loading" :loading="true" color="#3f83f8" size="1.5rem" class="mr-1"></clip-loader>
    {{ buttonText }}
  </span>
</template>

<script>
import ClipLoader from "vue-spinner/src/ClipLoader.vue";

export default {
  components: { ClipLoader },
  data() {
    return {
      loading: false,
      buttonText: "update DB",
    };
  },
  methods: {
    upDB() {
      this.loading = true;
      this.buttonText = "loading ...";
      axios.get("api/fill_data").then((res) => {
        this.loading = false;
        this.buttonText = "Request Sent!";
      });
    },
  },
};
</script>