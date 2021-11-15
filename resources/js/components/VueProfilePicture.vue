<template>
  <div>
    <img id="profile-picture"
         alt=""
         :style="style"
    >

    <input v-if="editing" type="file">

    <p v-show="errors === ''">{{errors}}</p>
  </div>
</template>

<script>

export default {
  style: {},
  props: {
    editing: {
      default: false,
    },
    errors: {
      default: '',
    }
  },
  data() {
    return {
      style: {backgroundImage: 'url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.TOvPFfUYMxiXkomgmtTZ_AAAAA%26pid%3DApi&f=1)'}
    }
  }
}
</script>

<style lang="scss">
#profile-picture {
  width: 130px;
  height: 130px;

  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}
</style>