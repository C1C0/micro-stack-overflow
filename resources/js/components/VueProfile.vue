<template>
  <div class="row">
    <div class="col-3">
      <vue-profile-picture :editing="editing"></vue-profile-picture>
    </div>
    <div class="col-8">
      <vue-profile-data :user="user" :editing="editing"></vue-profile-data>
    </div>
    <div class="col-1">
      <button @click="editing = !editing" class="btn btn-primary text-white">{{ editing ? 'Save' : 'Edit' }}</button>
    </div>
  </div>
</template>

<script>
import VueProfileData from "./VueProfileData";
import VueProfilePicture from "./VueProfilePicture";

export default {

  components: {VueProfileData, VueProfilePicture},
  props: {
    user: {
      required: true,
    }
  },
  data() {
    return {
      editing: false
    }
  }
}
</script>