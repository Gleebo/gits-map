<template>
  <div class="container">
    <div
      id="overlay"
      ref="overlay"
      @click="handleClick"
      @mouseenter="isHovering = true"
      @mouseleave="isHovering = false"
      @mousemove.stop="handleMouseMove"
    >
      <img
        src="map.jpg"
        class="img-responsive"
        alt="a facility map"
        width="720px"
      />
      <incident-marker v-if="isHovering" :markerData="hoverMarker" />
      <incident-marker
        v-for="marker in markers"
        :key="marker.id"
        :markerData="marker"
      />
    </div>
    <button type="button" @click="capture" class="btn btn-primary">
      capture
    </button>
    <p>{{ isHovering }}</p>
    <marker-description v-for="marker of markers" :key="marker.id" />
  </div>
</template>

<script>
import Marker from "./Marker";
import MarkerDescription from "./MarkerDescription";
import domtoimage from "dom-to-image";
import axios from "axios";
import { mapMutations, mapState, mapGetters } from "vuex";

export default {
  data() {
    return {
      isHovering: false,
    };
  },
  computed: {
    ...mapState(["markers", "hoverMarker"]),
    ...mapGetters(["coordinates"]),
  },
  methods: {
    ...mapMutations(["addMarker", "moveMarker"]),
    handleClick() {
      this.addMarker();
    },
    handleMouseMove(event) {
      const { height, width, x, y } =
        this.$refs.overlay.getBoundingClientRect();
      let top = (100 * (event.clientY - y)) / height;
      let left = (100 * (event.clientX - x)) / width;
      this.moveMarker({ top, left });
    },
    async capture() {
      const dataUrl = await domtoimage.toJpeg(this.$refs.overlay);
      const res = await axios({
        url: "/pdf",
        method: "POST",
        responseType: "blob",
        data: { img: dataUrl },
      });
      // console.log(res)
      // const url = window.URL.createObjectURL(new Blob([res.data]));
      const link = document.createElement("a");
      link.href = url;
      link.setAttribute("download", "test.pdf");
      document.body.appendChild(link);
      link.click();
    },
  },
  components: {
    "incident-marker": Marker,
    "marker-description": MarkerDescription,
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
