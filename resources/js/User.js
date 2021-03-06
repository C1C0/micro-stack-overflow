import axios from 'axios';

class User{
    constructor(id, username, email, picture) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.picture = picture
    }

    /**
     * Updates users specified attributes
     *
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    update(data = {}){
        return axios.put(`/user/${this.id}`, data);
    }

    updateProfilePicture(data = {}, headers){
        return axios.post(`/user/${this.id}/picture`, data, headers);
    }

    removeProfilePicture(){
        return axios.delete(`/user/${this.id}/picture`);
    }
}

export default User;