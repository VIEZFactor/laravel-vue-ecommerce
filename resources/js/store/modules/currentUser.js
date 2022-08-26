import axios from "axios";

const state = {
    user: {}
};

const getter = {};
const actions = {
    loginUser( {}, user){
        axios.post('/api/login', { 
            email: user.email, password: user.password 
        })
        .then(response => { 
            console.log(response); 
            if(response.data.access_token){
                // Save Token
                localStorage.setItem(
                    "user_email",
                    user.email
                )

                localStorage.setItem(
                    "access_token",
                    response.data.access_token
                )

            }
            user.email = '';
            user.password = '';
            window.location.assign("/#/admin");
            window.location.reload();
        })
        .catch(error => { 
            console.log(error.response);
            console.log('Status: ' + error.response.status); 
        });
    },
    logoutUser(){

        // Remove access token
        localStorage.removeItem("user_email");
        localStorage.removeItem("access_token");
        // Redirect to login
        window.location.assign('/#/login');
        window.location.reload();
    }
};
const mutations = {};

export default{
    namespaced: true,
    state,
    getter,
    actions,
    mutations
}