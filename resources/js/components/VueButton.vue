<template>
  <button class="btn btn-primary text-white" @click="$emit('click')"><slot></slot></button>
</template>

<script>
export default {

}
</script>