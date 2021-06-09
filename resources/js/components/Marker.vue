<template>
  <div id="outer" :style="getStyle">
    <div id="marker"></div>
  </div>
</template>
<script>

export default {
  props: {
    markerData: Object,
  },
  computed: {
    getStyle() {
      return `top: ${this.markerData.top}%; left: ${
        this.markerData.left
      }%; opacity: ${this.markerData.settled ? 1 : 0.5}`;
    },
  },
};
</script>
<style scoped>
#outer {
  position: absolute;
  height: 1px;
  width: 1px;
}
#marker {
  pointer-events: none;
  height: 1.5rem;
  width: 1.5rem;
  border-radius: 100%;
  background-color: red;
  position: relative;
  top: -0.75rem;
  left: -0.75rem;
}
</style>