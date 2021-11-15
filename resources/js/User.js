import axios from 'axios';

class User{
    constructor(id, username, email) {
        this.id = id;
        this.username = username;
        this.email = email;
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
}

export default User;