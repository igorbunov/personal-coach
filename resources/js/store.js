import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        access_token: ''
    },
    mutations: {
        setAccessToken(state, token) {
            state.access_token = token;
        }
    },
    actions: {
        SET_ACCESS_TOKEN({commit}, token) {
            commit('setAccessToken', token);
        }
    },
    getters: {
        ACCESS_TOKEN(state) {
            return state.access_token;
        }
    }
});

export default store;