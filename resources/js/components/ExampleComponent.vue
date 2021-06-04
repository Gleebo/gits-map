<template>
  <div class="container">
    <div id="overlay" ref="overlay" @click="handleClick">
      <img
        src="map.jpg"
        class="img-responsive"
        alt="a facility map"
        width="720px"
      />
      <incident-marker :top="top" :left="left" />
      <incident-marker top='50' left='50' />
    </div>
    <button type="button" @click="capture" class="btn btn-primary">
      capture
    </button>
    <img v-if="source" :src="source" alt="" />
  </div>
</template>

<script>
import Marker from "./Marker";
import domtoimage from "dom-to-image";
import axios from "axios";

export default {
  data() {
    return {
      top: 0,
      left: 0,
      source: null,
    };
  },
  methods: {
    handleClick(event) {
      const {
        height,
        width,
        x,
        y,
      } = this.$refs.overlay.getBoundingClientRect();
      this.top = (100 * (event.clientY - y)) / height;
      this.left = (100 * (event.clientX - x)) / width;
    },
    async capture() {
      const dataUrl = await domtoimage.toJpeg(this.$refs.overlay);
      const res = await axios({
        url: "/pdf",
        method: "POST",
        responseType: "blob",
        data: {img: dataUrl},
      });
      // console.log(res)
      const url = window.URL.createObjectURL(new Blob([res.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', 'test.pdf');
      document.body.appendChild(link);
      link.click();
    },
  },
  components: {
    "incident-marker": Marker,
  },
};
</script>
<style scoped>
.container {
  text-align: center;
}
div#overlay {
  position: relative;
  display: inline-block;
}
</style>
