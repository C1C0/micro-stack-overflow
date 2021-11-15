<template>
  <input :type="type" class="bg-primary bg-opacity-10 border-0" :value="value">
</template>

<script>
export default {
  props: {
    type: {
      default: 'text',
    },

    value: {
      default: '',
    }
  }
}
</script>