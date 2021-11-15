<template>
  <div class="row">
    <div class="col-3">
      <vue-profile-picture :editing="editing" :user="user"/>
    </div>
    <div class="col-8">
      <vue-profile-data :editing="editing" :user="user"/>
    </div>
    <div class="col-1">
      <button @click="editSaveUser" class="btn btn-primary text-white">{{ editing ? 'Save' : 'Edit' }}</button>
    </div>
  </div>
</template>

<script>
import VueProfileData from "./VueProfileData";
import VueProfilePicture from "../VueProfilePicture";
import User from "../../User";
import Errors from "../../Errors";

export default {

  components: {VueProfileData, VueProfilePicture},

  props: {
    // user object from the server
    data: {
      required: true,
    }
  },

  data() {
    return {
      editing: false,
      user: new User(this.data.id, this.data.username, this.data.email),
      errors: new Errors(),
    }
  },

  methods: {
    /**
     * Helper function as on one button we provide changing on the state and also data saving
     */
    editSaveUser() {
      this.errors = {};

      // check, if the state isn't on updating
      this.updateUser().then((data = null) => {
        // change to previous state
        this.editing = !this.editing;

        // URL is based on username
        if (data) {
          location.href = `/user/${this.user.username}`
        }
      }).catch(error => {
        console.log(error.errors);
        this.errors.errors = error.errors;
      });
    },

    /**
     * Updates user
     *
     * @returns {Promise<unknown>|Promise<AxiosResponse<any>>}
     */
    updateUser() {
      // If not editing, just resolve
      if (!this.editing) {
        return new Promise((resolve) => {
          resolve();
        });
      }

      return this.user.update({
        username: this.user.username,
        email: this.user.email,
      });
    }
  }
}
</script>