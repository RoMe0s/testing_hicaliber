import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        buildings: [],
    },
    getters: {
        getBuildings: state => state.buildings,
    },
    mutations: {
        setBuildings(state, buildings) {
            state.buildings = buildings;
        },
    },
    actions: {
        async loadBuildings({commit}, criteria = {}) {
            const response = await axios.get('/api/buildings', {params: criteria});
            await commit('setBuildings', response.data.data);
        },
    }
});

export default store;