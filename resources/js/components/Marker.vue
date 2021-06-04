<template>
  <div id="outer" :style="getCoordinates">
    <div id="marker"></div>
  </div>
</template>
<script>
export default {
  props: {
    left: Number,
    top: Number,
  },
  computed: {
    getCoordinates() {
      return `top: ${this.top}%; left: ${this.left}%`;
    }
  }
};
</script>
<style scoped>
#outer {
  position: absolute;
  height: 1px;
  width: 1px;
}
#marker {
  height: 1.5rem;
  width: 1.5rem;
  border-radius: 100%;
  background-color: red;
  position: relative;
  top: -0.75rem;
  left: -0.75rem
}
</style>