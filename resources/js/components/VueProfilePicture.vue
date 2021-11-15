<template>
  <div>
    <img id="profile-picture"
         alt=""
         :style="style"
    >

    <div v-if="editing">
      <input type="file" @change="preparePicture($event)">
      <vue-button @click="submitPicture">Upload picture</vue-button>
      <vue-button @click="removeProfilePicture">Remove picture</vue-button>
    </div>

    <p v-show="errors === ''">{{ errors }}</p>
  </div>
</template>

<script>

import VueButton from "./VueButton";

export default {
  components: {VueButton},
  style: {},
  props: {
    editing: {
      default: false,
    },
    errors: {
      default: '',
    },
    user: {
      required: true,
    }
  },
  data() {
    return {
      style: {},
      defaultPicutre: '/assets/images/default-profile-picture.jpg',
    }
  },

  mounted() {
    this.user.picture ??= this.defaultPicutre;
    this.style = {backgroundImage: `url(${this.user.picture})`};
  },

  methods: {
    preparePicture(event) {
      this.user.picture = event.target.files[0];
    },

    submitPicture() {
      if (this.user.picture && this.user.picture !== this.defaultPicutre) {
        let formData = new FormData();

        formData.append('picture', this.user.picture);

        this.user.updateProfilePicture(formData, {
              headers: {
                'Content-Type':
                    'multipart/form-data'
              }
            }
        ).then((data) => {
          console.log(data)
          location.reload();
        }).catch(error => {
          console.log(error)
        });
      }
    },

    removeProfilePicture() {
      let formData = new FormData();

      formData.append('picture', '');

      this.user.removeProfilePicture()
          .then((data) => {
            console.log(data)
            location.reload();
          }).catch(error => {
        console.log(error)
      });
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