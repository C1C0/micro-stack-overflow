<template>
  <div class="row">
    <div class="col-3">
      <vue-profile-picture :user="user"></vue-profile-picture>
    </div>
    <div class="col-8">
      <vue-profile-data-label name="username">{{user.username}}</vue-profile-data-label>
    </div>
    <div class="col-1"></div>
  </div>
</template>

<script>
import VueProfilePicture from "./VueProfilePicture";
import VueProfileDataLabel from "./VueProfileDataLabel";

export default {

  components: {VueProfileDataLabel, VueProfilePicture},
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